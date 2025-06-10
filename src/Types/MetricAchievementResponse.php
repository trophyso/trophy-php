<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\BaseAchievementResponse;
use Trophy\Core\Json\JsonProperty;
use DateTime;

class MetricAchievementResponse extends JsonSerializableType
{
    use BaseAchievementResponse;

    /**
     * @var string $trigger The trigger of the achievement, in this case always 'metric'.
     */
    #[JsonProperty('trigger')]
    public string $trigger;

    /**
     * @var string $metricId The ID of the metric associated with this achievement, if any.
     */
    #[JsonProperty('metricId')]
    public string $metricId;

    /**
     * @var float $metricValue The value of the metric required to complete the achievement, if this achievement is associated with a metric.
     */
    #[JsonProperty('metricValue')]
    public float $metricValue;

    /**
     * @var string $metricName The name of the metric associated with this achievement, if any.
     */
    #[JsonProperty('metricName')]
    public string $metricName;

    /**
     * @param array{
     *   trigger: string,
     *   metricId: string,
     *   metricValue: float,
     *   metricName: string,
     *   id: string,
     *   name: string,
     *   badgeUrl?: ?string,
     *   key?: ?string,
     *   achievedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->trigger = $values['trigger'];
        $this->metricId = $values['metricId'];
        $this->metricValue = $values['metricValue'];
        $this->metricName = $values['metricName'];
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->badgeUrl = $values['badgeUrl'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->achievedAt = $values['achievedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
