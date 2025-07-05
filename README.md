## Как запустить(через консоль)?
1) Клонируем
```
git clone https://github.com/Artifait/PHPLessons.git
```
2) Переходим в папку с **репозиторием**
```
cd PHPLessons
```
3) Перейти на другую ветку
```
git switch название_ветки
```
### Доп шаги для symfony
4) Перейти в папку **проекта** symfony
```
cd название_проекта
```
5) Установить зависимости проекта
```
composer i
```
### Доп шаги, если используется база данных
6) Создать базу
```
php bin/console doctrine:database:create
```
7) Применить миграции
```
php bin/console doctrine:migrations:migrate 
```
