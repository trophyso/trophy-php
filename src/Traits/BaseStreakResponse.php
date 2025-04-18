<?php

namespace Trophy\Traits;

use Trophy\Core\Json\JsonProperty;
use Trophy\Types\StreakFrequency;

trait BaseStreakResponse
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
}
