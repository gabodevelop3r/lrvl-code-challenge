# INICIAR PROYECTO CODE-CHALLENGE

## Iniciar proyecto
-   docker-compose build

## Ejecutar proyecto
-   docker-compose up -d

## .env
-   docker-compose exec app cp .env.example .env

## Instalar dependencias 
-   docker-compose exec app php artisan key:generate

## Instalar dependencias 
-   docker-compose exec app composer install

## Generar db sqlite
-   docker-compose exec app touch database/database.sqlite

## Ejecutar migraciones y seed
-   docker-compose exec app php artisan migrate:fresh --seed

## Compilar assets
-   docker-compose exec app npm i && npm run build

## Estado de los servicios en segundo plano
-   docker-compose ps

## El proyecto se ejecuta en  **http://localhost:8000**



