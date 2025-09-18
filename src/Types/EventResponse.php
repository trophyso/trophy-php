<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

class EventResponse extends JsonSerializableType
{
    /**
     * @var string $eventId The unique ID of the event.
     */
    #[JsonProperty('eventId')]
    public string $eventId;

    /**
     * @var string $metricId The unique ID of the metric that was updated.
     */
    #[JsonProperty('metricId')]
    public string $metricId;

    /**
     * @var float $total The user's new total progress against the metric.
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var ?array<CompletedAchievementResponse> $achievements Achievements completed as a result of this event.
     */
    #[JsonProperty('achievements'), ArrayType([CompletedAchievementResponse::class])]
    public ?array $achievements;

    /**
     * @var ?MetricEventStreakResponse $currentStreak The user's current streak.
     */
    #[JsonProperty('currentStreak')]
    public ?MetricEventStreakResponse $currentStreak;

    /**
     * @var ?array<string, MetricEventPointsResponse> $points A map of points systems by key.
     */
    #[JsonProperty('points'), ArrayType(['string' => MetricEventPointsResponse::class])]
    public ?array $points;

    /**
     * @var ?array<string, MetricEventLeaderboardResponse> $leaderboards A map of leaderboards by key.
     */
    #[JsonProperty('leaderboards'), ArrayType(['string' => MetricEventLeaderboardResponse::class])]
    public ?array $leaderboards;

    /**
     * @var ?string $idempotencyKey The idempotency key used for the event, if one was provided.
     */
    #[JsonProperty('idempotencyKey')]
    public ?string $idempotencyKey;

    /**
     * @var ?bool $idempotentReplayed Whether the event was replayed due to idempotency.
     */
    #[JsonProperty('idempotentReplayed')]
    public ?bool $idempotentReplayed;

    /**
     * @param array{
     *   eventId: string,
     *   metricId: string,
     *   total: float,
     *   achievements?: ?array<CompletedAchievementResponse>,
     *   currentStreak?: ?MetricEventStreakResponse,
     *   points?: ?array<string, MetricEventPointsResponse>,
     *   leaderboards?: ?array<string, MetricEventLeaderboardResponse>,
     *   idempotencyKey?: ?string,
     *   idempotentReplayed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->eventId = $values['eventId'];
        $this->metricId = $values['metricId'];
        $this->total = $values['total'];
        $this->achievements = $values['achievements'] ?? null;
        $this->currentStreak = $values['currentStreak'] ?? null;
        $this->points = $values['points'] ?? null;
        $this->leaderboards = $values['leaderboards'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->idempotentReplayed = $values['idempotentReplayed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
