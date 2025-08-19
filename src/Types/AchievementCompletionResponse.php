<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

class AchievementCompletionResponse extends JsonSerializableType
{
    /**
     * @var string $completionId The unique ID of the completion.
     */
    #[JsonProperty('completionId')]
    public string $completionId;

    /**
     * @var CompletedAchievementResponse $achievement
     */
    #[JsonProperty('achievement')]
    public CompletedAchievementResponse $achievement;

    /**
     * @var ?array<string, MetricEventPointsResponse> $points A map of points systems by key that were affected by this achievement completion.
     */
    #[JsonProperty('points'), ArrayType(['string' => MetricEventPointsResponse::class])]
    public ?array $points;

    /**
     * @param array{
     *   completionId: string,
     *   achievement: CompletedAchievementResponse,
     *   points?: ?array<string, MetricEventPointsResponse>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->completionId = $values['completionId'];
        $this->achievement = $values['achievement'];
        $this->points = $values['points'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
