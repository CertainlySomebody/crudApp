# crudApp
Crud App - Dockerized CRUD application, with frontend and backend separated

How to run on localhost
=======================
1. Clone entire project to your local machine.
2. Run commands as below in work directory of the project

       docker-compose up -d --build
       docker exec -ti crud-backend bash
       # inside backend container
       composer install
       php bin/console doctrine:migrations:migrate
       php bin/console doctrine:fixtures:load

3. Go to your browser and type:

       # backend
       localhost:8080 
       # frontend
       localhost:3000

Used Technologies
===================
   
       Symfony       - backend
       Nginx         - webserver
       PostgreSQL    - database
       Vue.js + Nuxt - frontend
       WindiCSS      - frontend CSS
       Docker        - Contenerizing

Used packages
=================

1. Backend - Symfony

       doctrine/annotations
       doctrine/doctrine-bundle
       doctrine/doctrine-fixtures-bundle
       doctrine/doctrine-migrations-bundle
       nelmio/cors-bundle
       symfony/flex
       synfony/maker-bundle

2. Frontend - Vue + Nuxt
      
       Nuxt
       Nuxt-windicss
       @formkit/nuxt


Future potential updates
===================
1. JWT authentication Nuxt + Symfony API.
2. More categories to CRUD.
3. Advanced code optimalization
4. Alert notifications on Nuxt
