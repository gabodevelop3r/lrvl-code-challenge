# INICIAR PROYECTO CODE-CHALLENGE

## Iniciar proyecto
-   docker-compose build

## Ejecutar proyecto
-   docker-compose up -d

## .env
-   docker-compose exec app cp .env.example .env
## Instalar dependencias 
-   docker-compose exec app composer install

## Generar clave de proyecto 
-   docker-compose exec app php artisan key:generate


## Generar db sqlite
-   docker-compose exec app touch database/database.sqlite

## Ejecutar migraciones y seed
-   docker-compose exec app php artisan migrate:fresh --seed

## Instalar dependencias
-   docker-compose exec app npm install

## Compilar assets
-   docker-compose exec app npm run build

## Estado de los servicios en segundo plano
-   docker-compose ps

## El proyecto se ejecuta en  **http://localhost:8000**



