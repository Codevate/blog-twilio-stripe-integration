# Disqus Blog

A companion project for our blog post on integrating the [Disqus](https://disqus.com/) comment system.

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

## Credits

- [Clean Blog template](https://startbootstrap.com/template-overviews/clean-blog/) provided by [David Miller](http://davidmiller.io/).
