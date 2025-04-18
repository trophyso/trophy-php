<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

class MetricResponse extends JsonSerializableType
{
    /**
     * @var string $id The unique ID of the metric.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $key The unique key of the metric.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $name The name of the metric.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $emoji The emoji to represent the metric.
     */
    #[JsonProperty('emoji')]
    public string $emoji;

    /**
     * @var value-of<MetricStatus> $status The status of the metric.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var float $current The user's current total for the metric.
     */
    #[JsonProperty('current')]
    public float $current;

    /**
     * @var array<MultiStageAchievementResponse> $achievements A list of the metric's achievements and the user's progress towards each.
     */
    #[JsonProperty('achievements'), ArrayType([MultiStageAchievementResponse::class])]
    public array $achievements;

    /**
     * @param array{
     *   id: string,
     *   key: string,
     *   name: string,
     *   emoji: string,
     *   status: value-of<MetricStatus>,
     *   current: float,
     *   achievements: array<MultiStageAchievementResponse>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->key = $values['key'];
        $this->name = $values['name'];
        $this->emoji = $values['emoji'];
        $this->status = $values['status'];
        $this->current = $values['current'];
        $this->achievements = $values['achievements'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
