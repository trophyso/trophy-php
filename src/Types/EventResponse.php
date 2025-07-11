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
     * @var ?MetricEventStreakResponse $currentStreak The user's current streak for the metric, if the metric has streaks enabled.
     */
    #[JsonProperty('currentStreak')]
    public ?MetricEventStreakResponse $currentStreak;

    /**
     * @var ?MetricEventPointsResponse $points The points added by this event, and a breakdown of the points awards that added points.
     */
    #[JsonProperty('points')]
    public ?MetricEventPointsResponse $points;

    /**
     * @param array{
     *   eventId: string,
     *   metricId: string,
     *   total: float,
     *   achievements?: ?array<CompletedAchievementResponse>,
     *   currentStreak?: ?MetricEventStreakResponse,
     *   points?: ?MetricEventPointsResponse,
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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
