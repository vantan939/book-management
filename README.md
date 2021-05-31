# How to run Booking Management

## 1. Env setup

- Run `php artisan key:generate` 
- Config the database to connect database
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book_management
DB_USERNAME=root
DB_PASSWORD=
```
- Add `MIX_API_KEY` under `APP_URL`. `MIX_API_KEY=TanKMQbgZPv0PRC6GqCMlDQ7fgdamsVY75FrQvHfoIbw4gBaG5UX0wfk6dugKxrtW`

## 2. Database
- Run `php artisan migrate`
- Run `php artisan db:seed`

## 3. Some users you can using in system
> Page Login: /login

| Email                 | Password  |  Role         |
| -------------         |:---------:|:-------------:|
| tannguyen1@gmail.com  | abc123    |Normal User    |
| tannguyen2@gmail.com  | abc1234   |Normal User    |
| admin@gmail.com       | abc123    |Admin          |