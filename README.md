- sudo docker-compose up -d --build
- sudo docker-compose exec app /bin/bash 
- php artisan migrate 
- php artisan permission:create-role user
- php artisan permission:create-role admin
- после зделать акк і дать йому адмін права
