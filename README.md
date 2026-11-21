# Trophy PHP SDK

The Trophy PHP SDK provides convenient access to the Trophy API from applications written in PHP.

Trophy is the 1:1 customer engagement platform for consumer web and mobile apps. AI lifecycle
marketing agents write and send personalized email and push to every user, alongside in-app
experiences like milestones, streaks, points, and leaderboards. This library gives your app access
to the Trophy API, so you can send the user events that power both.

## Installation

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require trophyso/php
```

To use the bindings, use the Composer's
[autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Usage

The package needs to be configured with your account's API key, which is available in the Trophy
web interface. Set the API key with the following:

```php
use Trophy\TrophyClient;
use Trophy\Metrics\Requests\MetricsEventRequest;
use Trophy\Types\EventRequestUser;

$trophy = new TrophyClient('your-api-key');
```

Then you can access the Trophy API through the `$trophy` client. For example, you can send a metric
event:

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

## Documentation

See the [Trophy API Docs](https://docs.trophy.so) for more
information on the accessible endpoints.
