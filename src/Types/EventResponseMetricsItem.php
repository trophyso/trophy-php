<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;
use Trophy\Core\Types\Union;

class EventResponseMetricsItem extends JsonSerializableType
{
    /**
     * @var ?string $trigger The trigger of the achievement, in this case either 'metric' or 'streak'.
     */
    #[JsonProperty('trigger')]
    public ?string $trigger;

    /**
     * @var ?string $metricId The ID of the metric that these achievements are associated with, if any.
     */
    #[JsonProperty('metricId')]
    public ?string $metricId;

    /**
     * @var array<MetricAchievementResponse|StreakAchievementResponse> $completed A list of any new achievements that the user has now completed as a result of this event being submitted.
     */
    #[JsonProperty('completed'), ArrayType([new Union(MetricAchievementResponse::class, StreakAchievementResponse::class)])]
    public array $completed;

    /**
     * @param array{
     *   trigger?: ?string,
     *   metricId?: ?string,
     *   completed: array<MetricAchievementResponse|StreakAchievementResponse>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->trigger = $values['trigger'] ?? null;
        $this->metricId = $values['metricId'] ?? null;
        $this->completed = $values['completed'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
