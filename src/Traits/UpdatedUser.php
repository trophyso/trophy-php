<?php

namespace Trophy\Traits;

use Trophy\Core\Json\JsonProperty;

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
     * @var ?bool $subscribeToEmails Whether the user should receive Trophy-powered emails. Cannot be false if an email is provided.
     */
    #[JsonProperty('subscribeToEmails')]
    public ?bool $subscribeToEmails;
}
