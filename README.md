## Install
`composer require dmt-software/auth-middleware`

## Usage

### Example using GuzzleHttp\Client

```php
<?php
 
use DMT\Auth\Authorization\ApiToken;
use DMT\Auth\AuthorizationMiddleware;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
 
$stack = new HandlerStack();
$stack->setHandler(new CurlHandler());
$stack->push(Middleware::mapRequest(new AuthorizationMiddleware(new ApiToken('abc123abc123'))));
 
$client = new Client([
    'handler' => $stack
]);
 
$response = $client->get('https://api.localhost.dev'); // api token is added before the request is sent.

```