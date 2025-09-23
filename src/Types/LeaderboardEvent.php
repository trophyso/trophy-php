<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use DateTime;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\Date;

/**
 * A leaderboard event representing a change in a user's rank or value.
 */
class LeaderboardEvent extends JsonSerializableType
{
    /**
     * @var ?DateTime $timestamp The timestamp when the event occurred.
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $timestamp;

    /**
     * @var ?int $previousRank The user's rank before this event, or null if they were not on the leaderboard.
     */
    #[JsonProperty('previousRank')]
    public ?int $previousRank;

    /**
     * @var ?int $rank The user's rank after this event, or null if they are no longer on the leaderboard.
     */
    #[JsonProperty('rank')]
    public ?int $rank;

    /**
     * @var ?int $previousValue The user's value before this event, or null if they were not on the leaderboard.
     */
    #[JsonProperty('previousValue')]
    public ?int $previousValue;

    /**
     * @var ?int $value The user's value after this event, or null if they are no longer on the leaderboard.
     */
    #[JsonProperty('value')]
    public ?int $value;

    /**
     * @param array{
     *   timestamp?: ?DateTime,
     *   previousRank?: ?int,
     *   rank?: ?int,
     *   previousValue?: ?int,
     *   value?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->timestamp = $values['timestamp'] ?? null;
        $this->previousRank = $values['previousRank'] ?? null;
        $this->rank = $values['rank'] ?? null;
        $this->previousValue = $values['previousValue'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
