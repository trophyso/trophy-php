<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

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
     * @var value-of<AchievementResponseTrigger> $trigger The trigger of the achievement.
     */
    #[JsonProperty('trigger')]
    public string $trigger;

    /**
     * @var ?string $description The description of this achievement.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $badgeUrl The URL of the badge image for the achievement, if one has been uploaded.
     */
    #[JsonProperty('badgeUrl')]
    public ?string $badgeUrl;

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
     * @var ?MetricEventStreakResponse $currentStreak The user's current streak for the metric, if the metric has streaks enabled.
     */
    #[JsonProperty('currentStreak')]
    public ?MetricEventStreakResponse $currentStreak;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   trigger: value-of<AchievementResponseTrigger>,
     *   description?: ?string,
     *   badgeUrl?: ?string,
     *   key?: ?string,
     *   streakLength?: ?int,
     *   metricId?: ?string,
     *   metricValue?: ?float,
     *   metricName?: ?string,
     *   currentStreak?: ?MetricEventStreakResponse,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->trigger = $values['trigger'];
        $this->description = $values['description'] ?? null;
        $this->badgeUrl = $values['badgeUrl'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->streakLength = $values['streakLength'] ?? null;
        $this->metricId = $values['metricId'] ?? null;
        $this->metricValue = $values['metricValue'] ?? null;
        $this->metricName = $values['metricName'] ?? null;
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
