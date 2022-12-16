# djvaleting

Steps to follow to set up the project. (same can be found in README.me)

1) Open the command Prompt
2) run command : git clone https://github.com/octobas10/djvaleting , to the directory where you want to run the project
3) Change directory to djvaleting [cd djvaleting]
3) composer update
4) rename .env.example to .env file as per you choice for database name (djvaleting)
5) php artisan migrate:fresh
6) php artisan key:generate && php artisan optimize
7) php artisan route:clear && php artisan config:cache && php artisan config:clear && php artisan view:clear
8) php artisan optimize
9) php artisan serve
10) run this url in your browser http://localhost:8000/

Admin Registration 
http://localhost:8000/register
