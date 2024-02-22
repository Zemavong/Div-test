## Тестовое задание в кампанию DIV

# [ссылка на задание](https://docs.google.com/document/d/1vfHYU8E_SPL9h_hGoXWN0b4AyCRsWlIn_cHLyp4P5Z8/edit?pli=1)

# [ссылка на сайт кампании](https://div-production.ru/)

<h1>Рабочее окружение</h1>
    <p> 
    Для работы приложения необходимо настроить рабочее окружение. Я использовал OpenServer со следующими модулями:
    </p>
<ul>
    <b>HTTP</b>
    <li>Apache_2.4 - PHP_8.0-PHP_8.1</li>
    <b>PHP</b>
    <li>PHP_8.0</li>
    <b>PostgreSQL</b>
    <li>PostgreSQL - 10</li>
    <b>Composer</b>
    <li>Composer - 2.6.6</li>
    <b>Laravel</b>
    <li>Laravel Framework 9.52.16</li>
</ul>

<p> 
    Далее необходимо в терминале перейти в клонированный    репозиторий, и обновить зависимости:
    <code>composer install</code> 
</p>

<p>
Скопируйте файл <code>.env.example</code> и переменуйте в <code>.env</code>. В этом файле необходимо указать данные для подключения к бд, и данные электронной почты, октуда будут посылаться письма при проверки заявок: <br> 
<code>MAIL_HOST=smtp.gmail.com  (если используете gmail)</code><br>
<code>MAIL_PORT=587</code><br>
<code>MAIL_ENCRYPTION=tls</code><br>
<code>MAIL_FROM_ADDRESS=ваша почта@gmail.com</code><br>
<code>MAIL_PASSWORD=password (его необходимо получить в настройках электронного ящика)</code><br>



Выполните команду для запуска миграции и заполнения бд
<code> php artisan migrate --seed </code>

Изначально в базе только один пользователь - админ. Для авторизации используйте логин 'admin@gmail.com' и пароль 'admin'. В системе не предусмотренно создание еще одного админа при помощи пользовательской системы. Чтобы проверить отправку писем - зарегистрируете пользователя с актуальной почтой (можете использовать ту же, что указали в файле <code>.env</code>).

<br>

Документация по эндпоинтам лежит в файле <code>divDoc.yaml</code>. Для ее написания я использовал Swagger.

</p>



</p>
