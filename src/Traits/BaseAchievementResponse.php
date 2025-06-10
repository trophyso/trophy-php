<?php

namespace Trophy\Traits;

use Trophy\Core\Json\JsonProperty;
use DateTime;
use Trophy\Core\Types\Date;

trait BaseAchievementResponse
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
     * @var ?string $badgeUrl The URL of the badge image for the achievement, if one has been uploaded.
     */
    #[JsonProperty('badgeUrl')]
    public ?string $badgeUrl;

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
}
