# Dix News
Laravel news demo project.

# Requirements

- Docker
- docker-compose
- php

# Running locally

First you need to have an valid `.env` file, just copy `.env.example` to `.env`

Open up `.env` in your favorite text editor and add `root` to `DB_PASSWORD=` environment variable, and you're ready to start!

Inside the project folder with docker running, start mysql:

```
docker-compose up
```

Run db migrations and seeds:

```
php artisan migrate --seed
```

And then start laravel artisan dev server:

```
php artisan serve
```

Navigate to `http://localhost:8000` and enjoy!

Use the following credentials to login:

username: admin@white.com
password: secret

# Copyrights

Copyrights 2023 - GabrielLacerda.
