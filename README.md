## Создание/Заполнение бд

```
-- Создание базы данных
CREATE DATABASE IF NOT EXISTS autosalon;
USE autosalon;

DROP TABLE IF EXISTS cars;
DROP TABLE IF EXISTS brands;

-- Таблица брендов
CREATE TABLE brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

-- Таблица автомобилей
CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    year YEAR NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

-- Наполнение таблицы брендов
INSERT INTO brands (name) VALUES
('Toyota'),
('BMW'),
('Mercedes-Benz'),
('Audi'),
('Ford'),
('Kia');

-- Наполнение таблицы автомобилей
INSERT INTO cars (brand_name, model, year, price) VALUES
('Toyota', 'Camry', 2022, 28000.00),
('Toyota', 'Corolla', 2021, 21000.00),
('BMW', 'X5', 2023, 60000.00),
('BMW', '3 Series', 2020, 35000.00),
('Mercedes-Benz', 'E-Class', 2022, 55000.00),
('Audi', 'A4', 2021, 40000.00),
('Ford', 'Focus', 2019, 17000.00),
('Kia', 'Sportage', 2022, 25000.00);
```
