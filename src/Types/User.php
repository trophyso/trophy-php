<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\UpsertedUser;
use Trophy\Core\Json\JsonProperty;
use DateTime;
use Trophy\Core\Types\Date;

/**
 * A user of your application.
 */
class User extends JsonSerializableType
{
    use UpsertedUser;

    /**
     * @var ?bool $control Whether the user is in the control group, meaning they do not receive emails or other communications from Trophy.
     */
    #[JsonProperty('control')]
    public ?bool $control;

    /**
     * @var ?DateTime $created The date and time the user was created, in ISO 8601 format.
     */
    #[JsonProperty('created'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $created;

    /**
     * @var ?DateTime $updated The date and time the user was last updated, in ISO 8601 format.
     */
    #[JsonProperty('updated'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updated;

    /**
     * @param array{
     *   control?: ?bool,
     *   created?: ?DateTime,
     *   updated?: ?DateTime,
     *   id: string,
     *   email?: ?string,
     *   name?: ?string,
     *   tz?: ?string,
     *   deviceTokens?: ?array<string>,
     *   subscribeToEmails?: ?bool,
     *   attributes?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->control = $values['control'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->updated = $values['updated'] ?? null;
        $this->id = $values['id'];
        $this->email = $values['email'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->tz = $values['tz'] ?? null;
        $this->deviceTokens = $values['deviceTokens'] ?? null;
        $this->subscribeToEmails = $values['subscribeToEmails'] ?? null;
        $this->attributes = $values['attributes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
