# Trophy PHP SDK

The Trophy PHP SDK provides convenient access to the Trophy API from applications written in PHP.

Trophy provides APIs and tools for adding gamification to your application, keeping users engaged
through rewards, achievements, streaks, and personalized communication.

## Documentation

See the [Trophy API Docs](https://trophy.docs.buildwithfern.com/overview/introduction) for more
information.

## Installation

Install the package with:

```bash
composer require trophyso/php
```

## Usage

The package needs to be configured with your account's API key, which is available in the Trophy
web interface. Set the API key with the following:

```php
use Trophy\TrophyClient;
use Trophy\Metrics\MetricsEventRequest;
use Trophy\Types\EventRequestUser;

$trophy = new TrophyClient('your-api-key');
```

Then you can access the Trophy API through the `$trophy` object.

```php
// Create a new user object
$user = new EventRequestUser([
    'id' => '18',
    'email' => 'jk.rowling@harrypotter.com'
]);

// Create a new MetricsEventRequest object
$request = new MetricsEventRequest([
    'user' => $user,
    'value' => 750
]);

// Send the event to the Trophy API
$trophy->metrics->event("words-written", $request);
```
