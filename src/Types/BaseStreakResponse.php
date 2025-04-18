<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

class BaseStreakResponse extends JsonSerializableType
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
     * @var ?string $started The date the streak started.
     */
    #[JsonProperty('started')]
    public ?string $started;

    /**
     * @var ?string $periodStart The start date of the current streak period.
     */
    #[JsonProperty('periodStart')]
    public ?string $periodStart;

    /**
     * @var ?string $periodEnd The end date of the current streak period.
     */
    #[JsonProperty('periodEnd')]
    public ?string $periodEnd;

    /**
     * @var ?string $expires The date the streak will expire if the user does not increment a metric.
     */
    #[JsonProperty('expires')]
    public ?string $expires;

    /**
     * @param array{
     *   length: int,
     *   frequency: value-of<StreakFrequency>,
     *   started?: ?string,
     *   periodStart?: ?string,
     *   periodEnd?: ?string,
     *   expires?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->length = $values['length'];
        $this->frequency = $values['frequency'];
        $this->started = $values['started'] ?? null;
        $this->periodStart = $values['periodStart'] ?? null;
        $this->periodEnd = $values['periodEnd'] ?? null;
        $this->expires = $values['expires'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
