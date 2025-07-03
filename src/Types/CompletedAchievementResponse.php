<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\AchievementResponse;
use DateTime;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\Date;

class CompletedAchievementResponse extends JsonSerializableType
{
    use AchievementResponse;

    /**
     * @var ?DateTime $achievedAt The date and time the achievement was completed, in ISO 8601 format.
     */
    #[JsonProperty('achievedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $achievedAt;

    /**
     * @param array{
     *   achievedAt?: ?DateTime,
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
        $this->achievedAt = $values['achievedAt'] ?? null;
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
