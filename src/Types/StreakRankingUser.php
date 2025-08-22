<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

/**
 * A user with their streak length in the rankings.
 */
class StreakRankingUser extends JsonSerializableType
{
    /**
     * @var string $userId The ID of the user.
     */
    #[JsonProperty('userId')]
    public string $userId;

    /**
     * @var ?string $name The name of the user. May be null if no name is set.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var int $streakLength The user's streak length (active or longest depending on query parameter).
     */
    #[JsonProperty('streakLength')]
    public int $streakLength;

    /**
     * @param array{
     *   userId: string,
     *   name?: ?string,
     *   streakLength: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->userId = $values['userId'];
        $this->name = $values['name'] ?? null;
        $this->streakLength = $values['streakLength'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
