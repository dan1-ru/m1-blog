**Установка и запуск**

1. Скопировать config-example.php в config.php
`cp config-example.php config.php`
2. Прописать настройки подключения к БД
3. Запустить команду composer
`composer dump-autoload` 
4. Запустить скрипт install.php через CLI
`php install.php`
5. В папке "public" создать папку "uploads" с необходимыми правами на запись
6. Запуск вебсервера:
`cd public && php -S localhost:8090`