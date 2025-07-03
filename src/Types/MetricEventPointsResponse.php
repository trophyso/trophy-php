<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\GetUserPointsResponse;
use Trophy\Core\Json\JsonProperty;

class MetricEventPointsResponse extends JsonSerializableType
{
    use GetUserPointsResponse;

    /**
     * @var ?float $added The points added by this event.
     */
    #[JsonProperty('added')]
    public ?float $added;

    /**
     * @param array{
     *   added?: ?float,
     *   total?: ?float,
     *   awards?: ?array<PointsAward>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->added = $values['added'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->awards = $values['awards'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
