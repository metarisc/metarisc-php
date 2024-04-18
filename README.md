
# Metarisc PHP

La librairie Metarisc PHP offre un accès simple et pratique à l'API Metarisc à partir d'applications écrites en langage PHP. Elle comprend un ensemble de classes et de fonctions pour l'ensemble des ressources de l'API.

## Compatibilité

PHP 8.0 minimum.

## Composer

Vous pouvez installer la librairie en utilisant [Composer](http://getcomposer.org/). Exécutez les commandes suivantes :

```bash
composer require metarisc/metarisc-php
```

Pour utiliser la librairie, utilisez l'[autoload Composer](https://getcomposer.org/doc/01-basic-usage.md#autoloading) :

```php
require_once 'vendor/autoload.php';
```

## Utilisation

### Initialisation avec une authentification OAuth2

#### Client credential flow :

Pour utiliser le flow [Client credential Grant]( https://datatracker.ietf.org/doc/html/rfc6749#section-4.4) :

```php
$metarisc = new \Metarisc\Metarisc([
    'metarisc_url' => 'https://api.metarisc.fr', // Optionnel
    'client_id' => 'your_client_id',
    'client_secret' => 'your_client_secret', // Optionnel
]);

$metarisc->authenticate('oauth2:client_credentials', [
    'scope' => 'openid', // Optionnel
    'access_token_url' => 'https://id.metarisc.fr/auth/realms/production/protocol/openid-connect/token', // Optionnel
]);
```

#### Authorization code flow :

Pour utiliser le flow [Authorization Code Grant]( https://datatracker.ietf.org/doc/html/rfc6749#section-4.1) vous devez récupérer un code en redirigeant l'user-agent de l'utilisateur vers le point de terminaison d'autorisation. Le client doit inclure son identifiant client, les scopes demandés, le state et un URI de redirection auquel le serveur d'autorisation renverra l'user-agent une fois l'accès accordé (ou refusé).

Pour faciliter la génération de l'URI vers le formulaire OAuth2 de Metarisc :

```php
$metarisc = \Metarisc\Auth\OAuth2::authorizeUrl([
    'client_id' => 'xx',
    'redirect_uri' => 'xx', // Optionnel
    'scope' => 'xx', // Optionnel
    'state' => 'xx', // Optionnel
]);
```

Lorsque l'utilisateur a accepté la demande, le serveur d'autorisation redirige l'user-agent vers l'URI de redirection client fourni à l'aide d'une réponse de redirection HTTP avec un authorization code. Vous pouvez ensuite utiliser ce dernier pour initialiser le client :

```php
$metarisc = new \Metarisc\Metarisc([
    'metarisc_url' => 'https://api.metarisc.fr', // Optionnel
    'client_id' => 'your_client_id', 
    'client_secret' => 'your_client_secret', // Optionnel
]);

$metarisc->authenticate('oauth2:authorization_code', [
    'code' => 'your_authorization_code',
    'scope' => 'openid', // Optionnel
    'access_token_url' => 'https://id.metarisc.fr/auth/realms/production/protocol/openid-connect/token', // Optionnel
    'redirect_uri' => 'https://your_redirect_uri', // Optionnel
    'enable_refresh_token_grant_type' => false, // Optionnel
]);
```

### Requêtes simples

Pour effectuer une requête sur Metarisc, vous pouvez utiliser la fonction request.

Exemple :

```php
$options = [];
$response = $metarisc->request('GET', '/@moi', $options);
```

La réponse obtenue est un objet [PSR7 Response](https://www.php-fig.org/psr/psr-7/#33-psrhttpmessageresponseinterface).

Note : Les options de requêtes disponibles sont celles de Guzzle (voir https://docs.guzzlephp.org/en/stable/request-options.html).

### Pagination

Pour récupérer des résultats paginés Metarisc (voir la [documentation](http://metarisc.fr/docs/api/#/#pagination)), vous pouvez utiliser une fonction simplifiant son utilisation :

```php
$paginator = $metarisc->pagination('GET', '/pei', ['query' => ['est_indisponible' => true]]);
$paginator->setMaxNbPages(75);
$paginator->setCurrentPage(3);
$nbResults = $paginator->getNbResults();
$currentPageResults = $paginator->getCurrentPageResults();
```

Le paginator obtenu est un objet [Pagerfanta](https://www.babdev.com/open-source/packages/pagerfanta/docs/4.x/usage).

Pour demander au paginator de retourner des objets métiers, vous pouvez passer l'option ```model_class``` afin qu'il puisse désérialiser des résultats de la page.

Note : Les options de requêtes disponibles sont celles de Guzzle (voir https://docs.guzzlephp.org/en/stable/request-options.html).
