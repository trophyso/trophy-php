<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\AchievementResponse;
use Trophy\Core\Json\JsonProperty;

class AchievementWithStatsResponse extends JsonSerializableType
{
    use AchievementResponse;

    /**
     * @var ?int $completions The number of users who have completed this achievement.
     */
    #[JsonProperty('completions')]
    public ?int $completions;

    /**
     * @var ?float $completedPercentage The percentage of all users who have completed this achievement.
     */
    #[JsonProperty('completedPercentage')]
    public ?float $completedPercentage;

    /**
     * @param array{
     *   completions?: ?int,
     *   completedPercentage?: ?float,
     *   id: string,
     *   name: string,
     *   trigger: string,
     *   description?: ?string,
     *   badgeUrl?: ?string,
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
        $this->completions = $values['completions'] ?? null;
        $this->completedPercentage = $values['completedPercentage'] ?? null;
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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
