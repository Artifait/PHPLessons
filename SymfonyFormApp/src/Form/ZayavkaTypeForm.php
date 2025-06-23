<?php

namespace App\Form;

use App\Entity\Zayavka;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ZayavkaTypeForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
      $builder
          ->add('name', null, [
              'constraints' => [
                  new NotBlank(['message' => 'Введите имя']),
              ],
          ])
          ->add('email', EmailType::class, [
              'constraints' => [
                  new NotBlank(['message' => 'Email обязателен']),
                  new Email(['message' => 'Введите корректный email']),
              ],
          ])
          ->add('message', null, [
              'constraints' => [
                  new NotBlank(['message' => 'Введите сообщение']),
              ],
          ]);
  }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Zayavka::class,
        ]);
    }
}
