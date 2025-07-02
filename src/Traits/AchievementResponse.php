<?php

namespace Trophy\Traits;

use Trophy\Core\Json\JsonProperty;

trait AchievementResponse
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
}
