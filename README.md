<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Админ панель на Filament 5.x. Здесь пользователь может управлять своими короткими ссылками и при клике на них записывается в статистику

## Инструкция развёртывния проекта


- Создать пустую папку для клонирования проекта
- Прописать в терминале в той же папке `git clone <ссылка на репозиторий>` (убедитесь, что на вашем ПК установлен GIT)
- Создать дубликат файла .env.example и переименовать на .env
- В .env указать:
    * БД {DB_CONNECTION} (sqlite (для него не нужен пароль, бд и порт), mysql, pgsql)
    * пароль {DB_PASSWORD}
    * базу данных {DB_DATABASE}
    * порт {DB_PORT}
- Прописываем следующие команды
``` bash
composer update --no-scripts
php artisan key:generate
php artisan migrate
composer update
npm i
php artisan filament:assets
npm run build
````

Далее зайти на админ панель и зарегистрироваться
