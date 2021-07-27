## install
- cp .env.example .env
- docker-compose up -d
- docker-compose exec app bash
- composer install && php artisan key:generate
- php artisan migrate --seed && php artisan passport:install

# postman collection 
- https://www.getpostman.com/collections/627e1f020cb56c8fb238

# Documentation
- apidoc: https://apidocjs.com/
- install apidoc in u'r local machine: npm install apidoc -g
- run to update documentation: apidoc -i routes/ -o public/apidoc/
- open in u'r browser http://url/apidoc
