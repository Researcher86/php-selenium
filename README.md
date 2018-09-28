### Технологии:
* Docker
* PHP 7, PHPUnit, Composer
* selenium

#### Подымаем контейнеры
```bash
./run.sh up    
```

#### Устанавливаем зависимости
```bash
 ./run.sh composer install   
```

#### Запуск произвольного скрипта
```bash
 ./run.sh php index.php   
```

#### Запуск тестов
```bash
 ./run.sh test  
```