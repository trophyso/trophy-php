<?php

namespace Trophy\Traits;

use Trophy\Core\Json\JsonProperty;
use Trophy\Types\LeaderboardResponseStatus;
use Trophy\Types\LeaderboardResponseRankBy;

/**
 * A leaderboard with its configuration details.
 */
trait LeaderboardResponse
{
    /**
     * @var string $id The unique ID of the leaderboard.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name The user-facing name of the leaderboard.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $key The unique key used to reference the leaderboard in APIs.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var ?value-of<LeaderboardResponseStatus> $status The status of the leaderboard.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var value-of<LeaderboardResponseRankBy> $rankBy What the leaderboard ranks by.
     */
    #[JsonProperty('rankBy')]
    public string $rankBy;

    /**
     * @var ?string $metricKey The key of the metric to rank by, if rankBy is 'metric'.
     */
    #[JsonProperty('metricKey')]
    public ?string $metricKey;

    /**
     * @var ?string $metricName The name of the metric to rank by, if rankBy is 'metric'.
     */
    #[JsonProperty('metricName')]
    public ?string $metricName;

    /**
     * @var ?string $pointsSystemKey The key of the points system to rank by, if rankBy is 'points'.
     */
    #[JsonProperty('pointsSystemKey')]
    public ?string $pointsSystemKey;

    /**
     * @var ?string $pointsSystemName The name of the points system to rank by, if rankBy is 'points'.
     */
    #[JsonProperty('pointsSystemName')]
    public ?string $pointsSystemName;

    /**
     * @var ?string $description The user-facing description of the leaderboard.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var string $start The start date of the leaderboard in YYYY-MM-DD format.
     */
    #[JsonProperty('start')]
    public string $start;

    /**
     * @var ?string $end The end date of the leaderboard in YYYY-MM-DD format, or null if it runs forever.
     */
    #[JsonProperty('end')]
    public ?string $end;

    /**
     * @var int $maxParticipants The maximum number of participants in the leaderboard.
     */
    #[JsonProperty('maxParticipants')]
    public int $maxParticipants;

    /**
     * @var ?string $runUnit The repetition type for recurring leaderboards, or null for one-time leaderboards.
     */
    #[JsonProperty('runUnit')]
    public ?string $runUnit;

    /**
     * @var int $runInterval The interval between repetitions, relative to the start date and repetition type.
     */
    #[JsonProperty('runInterval')]
    public int $runInterval;
}
