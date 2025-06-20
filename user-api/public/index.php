<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use App\Entity\User;

// Получаем EntityManager из bootstrap
$entityManager = require __DIR__ . '/../config/bootstrap.php';

// Symfony HTTP + Routing
$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);

$fileLocator = new FileLocator([__DIR__ . '/../config']);
$loader      = new YamlFileLoader($fileLocator);
$routes      = $loader->load('routes.yaml');

$matcher = new UrlMatcher($routes, $context);

try {
    $params     = $matcher->match($request->getPathInfo());
    $controller = $params['_controller'];

    switch ($controller) {
        case 'get_users':
            $users = $entityManager
                ->getRepository(User::class)
                ->findAll();

            $data = array_map(
                fn(User $u) => [
                    'id'    => $u->getId(),
                    'name'  => $u->getName(),
                    'email' => $u->getEmail(),
                ],
                $users
            );

            $response = new Response(
                json_encode($data, JSON_THROW_ON_ERROR),
                200,
                ['Content-Type' => 'application/json']
            );
            break;

        case 'create_user':
            $payload = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

            $user = new User();
            $user->setName($payload['name']  ?? '');
            $user->setEmail($payload['email'] ?? '');

            $entityManager->persist($user);
            $entityManager->flush();

            $response = new Response(
                json_encode(['status' => 'created'], JSON_THROW_ON_ERROR),
                201,
                ['Content-Type' => 'application/json']
            );
            break;

        default:
            $response = new Response('Not Found', 404);
    }
} catch (\Throwable $e) {
    $response = new Response(
        'Error: ' . $e->getMessage(),
        500
    );
}

$response->send();
