Local Movie Database

A very simple frontend to (very old and outdated) IMDb data, intended to demonstrate the Laravel framework.

**Installation**

- Create a base Laravel installation with: `composer create-project laravel/laravel local_movie_database`
- Copy the files from this repository into the installation, replacing when prompted.
- Configure your web server and run.

**Notes**

- Tested on Laravel 13.11.0, PHP 8.5.11 and MariaDB + SQLite.

- The SQLite database in *database/database.sqlite* already has all data so there is no need to change your .env file, but if you want to use a different system, *database/migrations* contain the migration files (run with `php artisan migrate`) and *database/sql/lmdb_laravel_data.sql* contains the actual data. Seeders have not been used due to the size of data.

- The database and images are intentionally incomplete. A handful of entries have been selected for demonstration purposes. If data does not exist, then it has not been provided.

- Written by hand. No AI used.
