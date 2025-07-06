# to-do-app
This is a sample Todo app with Laravel, MySQL, and Docker. It features:
  - Laravel 11 backend
  - RESTful API for task creation and completion
  - MySQL 8 for database
  - PhpMyAdmin for DB management

1. Clone the repository
   git clone https://github.com/ChamodiKu/to-do-app
   cd to-do-app

2. Copy .env.example to .env
   cp .env.example .env

3. Copy Dockerfile.example to Dockerfile
   cp Dockerfile.example Dockerfile

4. Build and start the containers
   docker-compose build --no-cache
   docker-compose up -d 

5. Run Laravel setup
   docker exec -it todo-app php artisan key:generate
   docker exec -it todo-app php artisan migrate

