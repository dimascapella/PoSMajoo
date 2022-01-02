# Point of Sale

## Database
[Database Link](DatabaseData)

## Data
Lakukan Command `php artisan migrate:fresh --seed` untuk membuat 1 data admin dan 1 data user

```
{
    Data Admin{
        "email": "superuser@majoo.com"
        "password": "superuser"
    },
        Data User{
        "email": "user@majoo.com"
        "password": "user"
    },
}
```

## Modules
Lakukan Command `npm i` untuk mendapatkan modules tambahan dari NPM

## Execute Apps
Lakukan Command `php artisan serve` untuk menjalankan aplikasi
