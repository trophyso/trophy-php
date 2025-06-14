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
     * @var string $name The name of this achievement.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $trigger The trigger of the achievement, either 'metric', 'streak', or 'api'.
     */
    #[JsonProperty('trigger')]
    public string $trigger;

    /**
     * @var ?string $badgeUrl The URL of the badge image for the achievement, if one has been uploaded.
     */
    #[JsonProperty('badgeUrl')]
    public ?string $badgeUrl;

    /**
     * @var ?DateTime $achievedAt The date and time the achievement was completed, in ISO 8601 format.
     */
    #[JsonProperty('achievedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $achievedAt;

    /**
     * @var ?string $key The key used to reference this achievement in the API (only applicable if trigger = 'api')
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?int $streakLength The length of the streak required to complete the achievement (only applicable if trigger = 'streak')
     */
    #[JsonProperty('streakLength')]
    public ?int $streakLength;

    /**
     * @var ?string $metricId The ID of the metric associated with this achievement (only applicable if trigger = 'metric')
     */
    #[JsonProperty('metricId')]
    public ?string $metricId;

    /**
     * @var ?float $metricValue The value of the metric required to complete the achievement (only applicable if trigger = 'metric')
     */
    #[JsonProperty('metricValue')]
    public ?float $metricValue;

    /**
     * @var ?string $metricName The name of the metric associated with this achievement (only applicable if trigger = 'metric')
     */
    #[JsonProperty('metricName')]
    public ?string $metricName;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   trigger: string,
     *   badgeUrl?: ?string,
     *   achievedAt?: ?DateTime,
     *   key?: ?string,
     *   streakLength?: ?int,
     *   metricId?: ?string,
     *   metricValue?: ?float,
     *   metricName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->trigger = $values['trigger'];
        $this->badgeUrl = $values['badgeUrl'] ?? null;
        $this->achievedAt = $values['achievedAt'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->streakLength = $values['streakLength'] ?? null;
        $this->metricId = $values['metricId'] ?? null;
        $this->metricValue = $values['metricValue'] ?? null;
        $this->metricName = $values['metricName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
