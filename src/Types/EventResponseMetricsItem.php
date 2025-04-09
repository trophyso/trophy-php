<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

class EventResponseMetricsItem extends JsonSerializableType
{
    /**
     * @var ?string $metricId The ID of the metric.
     */
    #[JsonProperty('metricId')]
    public ?string $metricId;

    /**
     * @var ?array<MultiStageAchievementResponse> $completed A list of any new achievements that the user has now completed as a result of this event being submitted.
     */
    #[JsonProperty('completed'), ArrayType([MultiStageAchievementResponse::class])]
    public ?array $completed;

    /**
     * @param array{
     *   metricId?: ?string,
     *   completed?: ?array<MultiStageAchievementResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->metricId = $values['metricId'] ?? null;
        $this->completed = $values['completed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
