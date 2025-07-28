<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\UpdatedUser;
use Trophy\Core\Json\JsonProperty;

/**
 * An object with editable user fields.
 */
class UpsertedUser extends JsonSerializableType
{
    use UpdatedUser;

    /**
     * @var string $id The ID of the user in your database. Must be a string.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @param array{
     *   id: string,
     *   email?: ?string,
     *   name?: ?string,
     *   tz?: ?string,
     *   deviceTokens?: ?array<string>,
     *   subscribeToEmails?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
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
