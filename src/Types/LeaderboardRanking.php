<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

/**
 * A user's ranking in a leaderboard.
 */
class LeaderboardRanking extends JsonSerializableType
{
    /**
     * @var string $userId The ID of the user.
     */
    #[JsonProperty('userId')]
    public string $userId;

    /**
     * @var ?string $userName The name of the user. May be null if no name is set.
     */
    #[JsonProperty('userName')]
    public ?string $userName;

    /**
     * @var int $rank The user's rank in the leaderboard.
     */
    #[JsonProperty('rank')]
    public int $rank;

    /**
     * @var int $value The user's value for this leaderboard (points, metric value, etc.).
     */
    #[JsonProperty('value')]
    public int $value;

    /**
     * @param array{
     *   userId: string,
     *   userName?: ?string,
     *   rank: int,
     *   value: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->userId = $values['userId'];
        $this->userName = $values['userName'] ?? null;
        $this->rank = $values['rank'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
