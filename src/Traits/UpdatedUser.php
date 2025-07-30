<?php

namespace Trophy\Traits;

use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

/**
 * An object with editable user fields.
 */
trait UpdatedUser
{
    /**
     * @var ?string $email The user's email address. Required if subscribeToEmails is true.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $name The name to refer to the user by in emails.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $tz The user's timezone (used for email scheduling).
     */
    #[JsonProperty('tz')]
    public ?string $tz;

    /**
     * @var ?array<string> $deviceTokens The user's device tokens, used for push notifications.
     */
    #[JsonProperty('deviceTokens'), ArrayType(['string'])]
    public ?array $deviceTokens;

    /**
     * @var ?bool $subscribeToEmails Whether the user should receive Trophy-powered emails. If false, Trophy will not store the user's email address.
     */
    #[JsonProperty('subscribeToEmails')]
    public ?bool $subscribeToEmails;
}
