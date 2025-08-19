<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

/**
 * Event attribute filter that must be met for this achievement to be completed. Only present if the achievement has an event filter configured.
 */
class AchievementWithStatsResponseEventAttribute extends JsonSerializableType
{
    /**
     * @var string $key The key of the event attribute.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $value The value of the event attribute.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   key: string,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
