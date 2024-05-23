Para hacer funcionar el proyecto hay que ejecutar los siguientes comandos aparte de los basicos de laravel:

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

php artisan permission:create-role "Super Admin" web

php artisan permission:create-role writer web "create company|edit company
