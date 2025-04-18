<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

/**
 * An object representing a past streak period.
 */
class StreakResponseStreakHistoryItem extends JsonSerializableType
{
    /**
     * @var string $periodStart The date this streak period started.
     */
    #[JsonProperty('periodStart')]
    public string $periodStart;

    /**
     * @var string $periodEnd The date this streak period ended.
     */
    #[JsonProperty('periodEnd')]
    public string $periodEnd;

    /**
     * @var int $length The length of the user's streak during this period.
     */
    #[JsonProperty('length')]
    public int $length;

    /**
     * @param array{
     *   periodStart: string,
     *   periodEnd: string,
     *   length: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->periodStart = $values['periodStart'];
        $this->periodEnd = $values['periodEnd'];
        $this->length = $values['length'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
