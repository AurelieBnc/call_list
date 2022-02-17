# call_list
page utilisant des API pour créer une liste d'appels téléphoniques

### Taper les commandes suivantes :
```
composer install
php bin/console assets:install public
composer require symfony/http-client
composer require ovh/ovh
php composer.phar install
```

### required
```
Pour Api Ovh dans php.ini : curl.cainfo = <absolute_path_to> cacert.pem
```