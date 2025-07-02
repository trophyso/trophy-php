<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

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
     * @param array{
     *   completionId: string,
     *   achievement: CompletedAchievementResponse,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->completionId = $values['completionId'];
        $this->achievement = $values['achievement'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
