**Инструкция:**

1. Выполнить команду "composer install" в корне проекта.
2. Ввести конфигурационные данные базы данных и SMTP-сервера в файле "config.php".
3. Выполнить миграции при помощи вызова команды "php Migrations.php up" из корня проекта.
Для отката таблиц следует воспользоваться командой "php Migrations.php down".

**Функционал проекта:**

1. Заполнение заявки (Имя, Email, Город, Заявка).
    - Валидация полей формы.
    - Отправка электронных писем клиенту и сотруднику после заполнения заявки.
2. Вывод все заявок из базы данных
3. Вывод все городов из базы данных