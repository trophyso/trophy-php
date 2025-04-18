<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\BaseStreakResponse;
use Trophy\Core\Json\JsonProperty;

/**
 * An object representing the user's streak after incrementing a metric.
 */
class IncrementMetricStreakResponse extends JsonSerializableType
{
    use BaseStreakResponse;

    /**
     * @var ?bool $extended Whether this metric event increased the user's streak length.
     */
    #[JsonProperty('extended')]
    public ?bool $extended;

    /**
     * @param array{
     *   extended?: ?bool,
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
        $this->extended = $values['extended'] ?? null;
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
