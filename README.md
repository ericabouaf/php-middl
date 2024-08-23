# Middl

A generic implementation of the middleware pattern in PHP

## Installation

```bash
composer require ericabouaf/middl
```

## Usage

### Configuration des Middlewares

Pour configurer les middlewares, vous devez créer une classe qui étend `AbstractFlow` et implémente la méthode `configureMiddlewares`.

```php
use YourNamespace\AbstractFlow;
use YourNamespace\Middleware\DummyMiddleware;

class SampleFlow extends AbstractFlow
{
    protected function configureMiddlewares(): array
    {
        return [
            new DummyMiddleware('example'),
            // Ajoutez d'autres middlewares ici
        ];
    }
}
```

### Création d'un Middleware

Pour créer un middleware, vous pouvez étendre `AbstractMiddleware` ou `BeforeAfterMiddleware` selon vos besoins.

#### Exemple avec `AbstractMiddleware`

```php
use YourNamespace\AbstractMiddleware;
use YourNamespace\Request;
use YourNamespace\Response;

class SampleCustomMiddleware extends AbstractMiddleware
{
    public function __invoke(Request $request, callable $next): Response
    {
        // Logique du middleware avant l'appel du prochain middleware
        $response = $next($request);
        // Logique du middleware après l'appel du prochain middleware
        return $response;
    }
}
```

#### Exemple avec `BeforeAfterMiddleware`

```php
use YourNamespace\Middleware\BeforeAfterMiddleware;
use YourNamespace\Request;
use YourNamespace\Response;

class SampleBeforeAfterMiddleware extends BeforeAfterMiddleware
{
    public function before(Request $request): void
    {
        // Logique avant l'appel du prochain middleware
    }

    public function after(Request $request, Response $response): Response
    {
        // Logique après l'appel du prochain middleware
        return $response;
    }
}
```

### Exécution des Middlewares

Pour exécuter les middlewares, utilisez la méthode `run` de la classe `MiddlewareRunner`.

```php
use YourNamespace\MiddlewareRunner;
use YourNamespace\Request;
use YourNamespace\Response;
use Psr\Log\NullLogger;

$request = new Request(['param1' => 'value1']);
$middlewares = [
    new SampleCustomMiddleware(),
    new SampleBeforeAfterMiddleware(),
    // Ajoutez d'autres middlewares ici
];

$response = MiddlewareRunner::run($middlewares, $request, new NullLogger());
```
