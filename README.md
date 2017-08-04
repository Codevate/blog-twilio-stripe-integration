# Premium Blog

A companion Symfony project for our blog post on integrating [Twilio](https://twilio.com/) and [Stripe](https://stripe.com/).

## Getting started

Install dependencies:

```
composer install
```

Create the database, setup the schema, and load the fixtures:

```
php app/console doctrine:database:create --if-not-exists
php app/console doctrine:schema:update --force
php app/console doctrine:fixtures:load
```

Start the server:

```
php app/console server:run
```

You can now log in with the username and password `test` at http://127.0.0.1:8000/login

## Credits

- [Clean Blog template](https://startbootstrap.com/template-overviews/clean-blog/) provided by [David Miller](http://davidmiller.io/).

## About Codevate
Codevate is a specialist [app development company](https://www.codevate.com/) that builds cloud-connected software. This repository was created for a blog post about a [custom web application development](https://www.codevate.com/services/web-development) project and was written by [Chris Lush](https://github.com/lushc).
