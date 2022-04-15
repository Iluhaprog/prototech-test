#### before running
1. Run this command:
```bash
  php artisan passport:install
```
2. Create .env file from .env.example and change this:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE={your database}
DB_USERNAME={your user}
DB_PASSWORD={your password}
```


#### commands
1. if database is empty then fill it with currencies for last 30 days.
```bash 
php artisan currencies:fill
```
2. run cron command for daily filling database with currencies
```bash
php artisan schedule:work > path/to/log/file &
```

#### run
1. run app
```bash
php artisan serve
```