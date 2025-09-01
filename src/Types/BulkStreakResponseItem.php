<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

class BulkStreakResponseItem extends JsonSerializableType
{
    /**
     * @var string $userId The ID of the user.
     */
    #[JsonProperty('userId')]
    public string $userId;

    /**
     * @var int $streakLength The length of the user's streak.
     */
    #[JsonProperty('streakLength')]
    public int $streakLength;

    /**
     * @var ?string $extended The timestamp the streak was extended, as a string.
     */
    #[JsonProperty('extended')]
    public ?string $extended;

    /**
     * @param array{
     *   userId: string,
     *   streakLength: int,
     *   extended?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->userId = $values['userId'];
        $this->streakLength = $values['streakLength'];
        $this->extended = $values['extended'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
