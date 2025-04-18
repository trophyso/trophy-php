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
     * @var ?array<EventResponseMetricsItem> $achievements Changes to achievements as a result of this event.
     */
    #[JsonProperty('achievements'), ArrayType([EventResponseMetricsItem::class])]
    public ?array $achievements;

    /**
     * @var ?IncrementMetricStreakResponse $currentStreak The user's current streak for the metric, if the metric has streaks enabled.
     */
    #[JsonProperty('currentStreak')]
    public ?IncrementMetricStreakResponse $currentStreak;

    /**
     * @param array{
     *   eventId: string,
     *   metricId: string,
     *   total: float,
     *   achievements?: ?array<EventResponseMetricsItem>,
     *   currentStreak?: ?IncrementMetricStreakResponse,
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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
