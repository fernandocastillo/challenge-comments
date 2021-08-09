# The comments challenge

### Stack used during the development
Laravel 5.5

PHP 7.4

Node v14.16.0
### Installation

Clone and install composer and node dependencies

```sh
git clone git@github.com:fernandocastillo/challenge-comments.git
cd callenge-comments
composer install
npm install
```

Configure your local database credentials in your .env file

```sh
cp ./.env.example ./.env
```

Run migrations and seeders

```sh
php artisan migrate --seed
```

### Testing
TDD was implemented during api development.

Unfortunately I was not able to install neither Vue Testing Library nor Vue Test Utils with this Laravel version.

```sh
composer test
```

## API Endpoints


| Method | Endpoint | Description |
| ------ | ------ | ------ |
| GET | /api/comment[?page=x] | Get paginated comments |
| POST | /api/comment | Create a comment. Payload: { name, comment, [parent_id]} |

## Working locally
Run the server:
```sh
php artisan serve
```

Watch for js/css changes:

```sh
npm run watch
```

Check your browser

```sh
http://localhost:8000
```


## Author

Fernando Castillo <desarrollo@freengers.com>

[freengers.com](https://freengers.com)
