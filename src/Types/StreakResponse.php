<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

class StreakResponse extends JsonSerializableType
{
    /**
     * @var int $length The length of the user's current streak.
     */
    #[JsonProperty('length')]
    public int $length;

    /**
     * @var value-of<StreakFrequency> $frequency The frequency of the streak.
     */
    #[JsonProperty('frequency')]
    public string $frequency;

    /**
     * @param array{
     *   length: int,
     *   frequency: value-of<StreakFrequency>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->length = $values['length'];
        $this->frequency = $values['frequency'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
