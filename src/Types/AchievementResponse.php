<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;
use DateTime;
use Trophy\Core\Types\Date;

class AchievementResponse extends JsonSerializableType
{
    /**
     * @var string $id The unique ID of the achievement.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $name The name of this achievement.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $badgeUrl The URL of the badge image for the achievement, if one has been uploaded.
     */
    #[JsonProperty('badgeUrl')]
    public ?string $badgeUrl;

    /**
     * @var ?string $metricId The ID of the metric associated with this achievement, if any.
     */
    #[JsonProperty('metricId')]
    public ?string $metricId;

    /**
     * @var ?float $metricValue The value of the metric required to complete the achievement, if this achievement is associated with a metric.
     */
    #[JsonProperty('metricValue')]
    public ?float $metricValue;

    /**
     * @var ?string $metricName The name of the metric associated with this achievement, if any.
     */
    #[JsonProperty('metricName')]
    public ?string $metricName;

    /**
     * @var ?string $key The key used to reference this achievement in the API.
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?DateTime $achievedAt The date and time the achievement was completed, in ISO 8601 format.
     */
    #[JsonProperty('achievedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $achievedAt;

    /**
     * @param array{
     *   id: string,
     *   name?: ?string,
     *   badgeUrl?: ?string,
     *   metricId?: ?string,
     *   metricValue?: ?float,
     *   metricName?: ?string,
     *   key?: ?string,
     *   achievedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'] ?? null;
        $this->badgeUrl = $values['badgeUrl'] ?? null;
        $this->metricId = $values['metricId'] ?? null;
        $this->metricValue = $values['metricValue'] ?? null;
        $this->metricName = $values['metricName'] ?? null;
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
