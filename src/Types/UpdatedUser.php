<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

/**
 * An object with editable user fields.
 */
class UpdatedUser extends JsonSerializableType
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
     * @var ?bool $subscribeToEmails Whether the user should receive Trophy-powered emails. Cannot be false if an email is provided.
     */
    #[JsonProperty('subscribeToEmails')]
    public ?bool $subscribeToEmails;

    /**
     * @param array{
     *   email?: ?string,
     *   name?: ?string,
     *   tz?: ?string,
     *   deviceTokens?: ?array<string>,
     *   subscribeToEmails?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->tz = $values['tz'] ?? null;
        $this->deviceTokens = $values['deviceTokens'] ?? null;
        $this->subscribeToEmails = $values['subscribeToEmails'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
