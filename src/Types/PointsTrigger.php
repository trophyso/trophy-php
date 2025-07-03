<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

class PointsTrigger extends JsonSerializableType
{
    /**
     * @var ?string $id The ID of the trigger
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?value-of<PointsTriggerType> $type The type of trigger
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?float $points The points awarded by this trigger.
     */
    #[JsonProperty('points')]
    public ?float $points;

    /**
     * @var ?string $metricName If the trigger has type 'metric', the name of the metric
     */
    #[JsonProperty('metricName')]
    public ?string $metricName;

    /**
     * @var ?float $metricThreshold If the trigger has type 'metric', the threshold of the metric that triggers the points
     */
    #[JsonProperty('metricThreshold')]
    public ?float $metricThreshold;

    /**
     * @var ?float $streakLengthThreshold If the trigger has type 'streak', the threshold of the streak that triggers the points
     */
    #[JsonProperty('streakLengthThreshold')]
    public ?float $streakLengthThreshold;

    /**
     * @var ?string $achievementName If the trigger has type 'achievement', the name of the achievement
     */
    #[JsonProperty('achievementName')]
    public ?string $achievementName;

    /**
     * @param array{
     *   id?: ?string,
     *   type?: ?value-of<PointsTriggerType>,
     *   points?: ?float,
     *   metricName?: ?string,
     *   metricThreshold?: ?float,
     *   streakLengthThreshold?: ?float,
     *   achievementName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->points = $values['points'] ?? null;
        $this->metricName = $values['metricName'] ?? null;
        $this->metricThreshold = $values['metricThreshold'] ?? null;
        $this->streakLengthThreshold = $values['streakLengthThreshold'] ?? null;
        $this->achievementName = $values['achievementName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
