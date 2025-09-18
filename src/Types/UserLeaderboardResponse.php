<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\LeaderboardResponse;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

/**
 * A user's data for a specific leaderboard including rank, value, and history.
 */
class UserLeaderboardResponse extends JsonSerializableType
{
    use LeaderboardResponse;

    /**
     * @var ?int $rank The user's current rank in this leaderboard. Null if the user is not on the leaderboard.
     */
    #[JsonProperty('rank')]
    public ?int $rank;

    /**
     * @var ?int $value The user's current value in this leaderboard. Null if the user is not on the leaderboard.
     */
    #[JsonProperty('value')]
    public ?int $value;

    /**
     * @var array<LeaderboardEvent> $history An array of events showing the user's rank and value changes over time.
     */
    #[JsonProperty('history'), ArrayType([LeaderboardEvent::class])]
    public array $history;

    /**
     * @param array{
     *   rank?: ?int,
     *   value?: ?int,
     *   history: array<LeaderboardEvent>,
     *   id: string,
     *   name: string,
     *   key: string,
     *   status?: ?value-of<LeaderboardResponseStatus>,
     *   rankBy: value-of<LeaderboardResponseRankBy>,
     *   metricKey?: ?string,
     *   metricName?: ?string,
     *   pointsSystemKey?: ?string,
     *   pointsSystemName?: ?string,
     *   description?: ?string,
     *   start: string,
     *   end?: ?string,
     *   maxParticipants: int,
     *   runUnit?: ?string,
     *   runInterval: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rank = $values['rank'] ?? null;
        $this->value = $values['value'] ?? null;
        $this->history = $values['history'];
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->key = $values['key'];
        $this->status = $values['status'] ?? null;
        $this->rankBy = $values['rankBy'];
        $this->metricKey = $values['metricKey'] ?? null;
        $this->metricName = $values['metricName'] ?? null;
        $this->pointsSystemKey = $values['pointsSystemKey'] ?? null;
        $this->pointsSystemName = $values['pointsSystemName'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->start = $values['start'];
        $this->end = $values['end'] ?? null;
        $this->maxParticipants = $values['maxParticipants'];
        $this->runUnit = $values['runUnit'] ?? null;
        $this->runInterval = $values['runInterval'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
