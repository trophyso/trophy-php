<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\AchievementResponse;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

class AchievementWithStatsResponse extends JsonSerializableType
{
    use AchievementResponse;

    /**
     * @var ?int $completions The number of users who have completed this achievement.
     */
    #[JsonProperty('completions')]
    public ?int $completions;

    /**
     * @var ?float $rarity The percentage of all users who have completed this achievement.
     */
    #[JsonProperty('rarity')]
    public ?float $rarity;

    /**
     * @var ?array<AchievementWithStatsResponseUserAttributesItem> $userAttributes User attribute filters that must be met for this achievement to be completed. Only present if the achievement has user attribute filters configured.
     */
    #[JsonProperty('userAttributes'), ArrayType([AchievementWithStatsResponseUserAttributesItem::class])]
    public ?array $userAttributes;

    /**
     * @var ?AchievementWithStatsResponseEventAttribute $eventAttribute Event attribute filter that must be met for this achievement to be completed. Only present if the achievement has an event filter configured.
     */
    #[JsonProperty('eventAttribute')]
    public ?AchievementWithStatsResponseEventAttribute $eventAttribute;

    /**
     * @param array{
     *   completions?: ?int,
     *   rarity?: ?float,
     *   userAttributes?: ?array<AchievementWithStatsResponseUserAttributesItem>,
     *   eventAttribute?: ?AchievementWithStatsResponseEventAttribute,
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
        $this->completions = $values['completions'] ?? null;
        $this->rarity = $values['rarity'] ?? null;
        $this->userAttributes = $values['userAttributes'] ?? null;
        $this->eventAttribute = $values['eventAttribute'] ?? null;
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
