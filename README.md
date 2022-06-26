# suluk-bookstore

by Ahmad Rafif Alaudin and Fauzan Pradana

## How to use this repo?

### Clone
Clone this repo using 
```
git clone https://github.com/fauzanpr/suluk-bookstore.git
```

### Install Composer
Open it, and then your terminal (make sure you're on the right directory). Then, type
```
composer install
```

### Make your .env
Copy the .env.example and paste in the same directory. Rename it into .env

### Generate Your Key
you can generate the App Key of your .env using
```
php artisan key:generate
```

### Edit your .env
You can edit your .env, such as DATABASE_NAME. Customize it corresponding your database name.

### Migrate and Seed
```
php artisan migrate:fresh --seed
```

### Don't forget to Change Your .env
add FILESYSTEM_DRIVER=public

### Lets make link media on storage to public
php artisan storage:link

### Run it :)
You can run, using
```
php artisan serve
```
