# Middl

A generic implementation of the middleware pattern in PHP

## Installation

```bash
composer require ericabouaf/middl
```

## Usage

### Middleware Configuration

To configure the middlewares, you need to create a class that extends `AbstractFlow` and implements the `configureMiddlewares` method.

```php
use YourNamespace\AbstractFlow;
use YourNamespace\Middleware\DummyMiddleware;

class SampleFlow extends AbstractFlow
{
    protected function configureMiddlewares(): array
    {
        return [
            new DummyMiddleware('example'),
            // Add other middlewares here
        ];
    }
}
```

### Creating a Middleware

To create a middleware, you can extend `AbstractMiddleware` or `BeforeAfterMiddleware` according to your needs.

#### Example with `AbstractMiddleware`

```php
use YourNamespace\AbstractMiddleware;
use YourNamespace\Request;
use YourNamespace\Response;

class SampleCustomMiddleware extends AbstractMiddleware
{
    public function __invoke(Request $request, callable $next): Response
    {
        // Middleware logic before calling the next middleware
        $response = $next($request);
        // Middleware logic after calling the next middleware
        return $response;
    }
}
```

#### Example with `BeforeAfterMiddleware`

```php
use YourNamespace\Middleware\BeforeAfterMiddleware;
use YourNamespace\Request;
use YourNamespace\Response;

class SampleBeforeAfterMiddleware extends BeforeAfterMiddleware
{
    public function before(Request $request): void
    {
        // Logic before calling the next middleware
    }

    public function after(Request $request, Response $response): Response
    {
        // Logic after calling the next middleware
        return $response;
    }
}
```

### Executing the Middlewares without a Flow

To execute the middlewares, use the `run` method of the `MiddlewareRunner` class.

```php
use YourNamespace\MiddlewareRunner;
use YourNamespace\Request;
use YourNamespace\Response;
use Psr\Log\NullLogger;

$request = new Request(['param1' => 'value1']);
$middlewares = [
    new SampleCustomMiddleware(),
    new SampleBeforeAfterMiddleware(),
    // Add other middlewares here
];

$response = MiddlewareRunner::run($middlewares, $request, new NullLogger());
```
