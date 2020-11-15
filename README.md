## About project

This project is mainly used for file and image uploading. It also shows images in a nice gallery format.

### Installation
```bash

// clone
git clone git@github.com:zeshan77/naushad.git [your-directory]

cd [your-directory]

cp .env.example .env

composer install

npm install && npm run dev

```

### Setup database

Set db credentials in `.env`

Run migration by running the following command:

`php artisan migrate`

### Start server
`php artisan serve`

You're good to go -:)
