<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\LeaderboardResponse;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

class LeaderboardResponseWithRankings extends JsonSerializableType
{
    use LeaderboardResponse;

    /**
     * @var array<LeaderboardRanking> $rankings Array of user rankings for the leaderboard.
     */
    #[JsonProperty('rankings'), ArrayType([LeaderboardRanking::class])]
    public array $rankings;

    /**
     * @param array{
     *   rankings: array<LeaderboardRanking>,
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
        $this->rankings = $values['rankings'];
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
