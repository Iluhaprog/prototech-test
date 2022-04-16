## [Link to frontend](https://github.com/Iluhaprog/prototech-test-frontend)

### Common
#### 1. before running
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


#### 2. commands
1. if database is empty then fill it with currencies for last 30 days.
```bash 
php artisan currencies:fill
```
2. run cron command for daily filling database with currencies
```bash
php artisan schedule:work > path/to/log/file &
```

#### 3. run
1. run app
```bash
php artisan serve
```

> #### also you can run it with docker
> 1. go to root of project
> 2. run `docker build -t laravel-test .`
> 3. run `docker-compose up`

### Path to Swagger is:
http://{your host and port}/api/documentation

### REST API endpoints
1. `/api/sign-in` - for login.
Request example: 
```bash
curl -X POST \
  'http://localhost:8000/api/sign-in' \
  --header 'Accept: application/json' \
  --header 'User-Agent: Thunder Client (https://www.thunderclient.com)' \
  --header 'Content-Type: application/json' \
  --data-raw '{
    "email": "{your email}",
    "password": "{your password}"
}'
```
2. `/api/sign-up` - for registration
Request example:
```bash
curl -X POST \
  'http://localhost:8000/api/sign-up' \
  --header 'Accept: application/json' \
  --header 'User-Agent: Thunder Client (https://www.thunderclient.com)' \
  --header 'Content-Type: application/json' \
  --data-raw '{
    "name": "{your name}",
    "email": "{your email}",
    "password": "{your password}"
}'
```

3. `/api/currency/{valuteId}?from={date1}&to={date2}` - for getting data about currency date1, date2 format yyyy-mm-dd
Request example
```bash
curl -X GET \
  'http://localhost:8000/api/currency/R01060?from=2022-03-24&to=2022-03-24' \
  --header 'User-Agent: Thunder Client (https://www.thunderclient.com)' \
  --header 'Accept: application/json' \
  --header 'Authorization: Bearer {your token}'
```
