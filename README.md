# Premium Blog

A companion Symfony project for our blog post on integrating [Twilio](https://twilio.com/) and [Stripe](https://stripe.com/).

![Example Screenshot](/web/img/post-sample-image.jpg?raw=true "Example Screenshot")

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

Use [ngrok](http://ngrok.io) to tunnel to the server:

```
ngrok http 8000
```

You can now log in with the username and password `test` at http://xxxxxxxx.ngrok.io/login

## Credits

- [Clean Blog template](https://startbootstrap.com/template-overviews/clean-blog/) provided by [David Miller](http://davidmiller.io/).

## About Codevate
Codevate is a specialist [UK mobile app development company](https://www.codevate.com/) that builds cloud-connected software. This repository was created for a blog post about a [custom web application development](https://www.codevate.com/services/web-development) project and was written by [Chris Lush](https://github.com/lushc).
