# User Dataset API and WebSocket

## Prerequisites

- PHP 7.4+
- Composer
- Node.js
- Redis
- MySQL

## Installation

1. Clone the repository:
    ```sh
    https://github.com/ShihabMahmod/Interview-Task2
    cd user-dataset
    ```

2. Install PHP dependencies:
    ```sh
    composer install
    ```

3. Install Node.js dependencies:
    ```sh
    npm install
    ```

4. Configure `.env` file:
    ```dotenv
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=base64:YOUR_APP_KEY
    APP_DEBUG=true
    APP_URL=http://localhost

    BROADCAST_DRIVER=redis
    CACHE_DRIVER=redis
    QUEUE_CONNECTION=redis
    SESSION_DRIVER=redis

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

    PUSHER_APP_ID=your_pusher_app_id
    PUSHER_APP_KEY=your_pusher_app_key
    PUSHER_APP_SECRET=your_pusher_app_secret
    PUSHER_APP_CLUSTER=mt1
    ```

5. Run database migrations and seeders:
    ```sh
    php artisan migrate --seed
    ```

6. Install Laravel Passport:
    ```sh
    php artisan passport:install
    ```

7. Start the Laravel Echo Server:
    ```sh
    laravel-echo-server start
    ```

8. Start the Laravel server:
    ```sh
    php artisan serve
    ```

## Usage

- API Endpoint: [GET] `/api/users` (JWT-protected)

- WebSocket Channel: `users` (Broadcasts user data)
