<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

/**
 * The user that triggered the event.
 */
class EventRequestUser extends JsonSerializableType
{
    /**
     * @var string $id The ID of the user in your database. Must be a string.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $email The user's email address.
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
     * @param array{
     *   id: string,
     *   email?: ?string,
     *   name?: ?string,
     *   tz?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->email = $values['email'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->tz = $values['tz'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
