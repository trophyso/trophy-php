<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

class GetUserPointsResponse extends JsonSerializableType
{
    /**
     * @var ?float $total The user's total points
     */
    #[JsonProperty('total')]
    public ?float $total;

    /**
     * @var ?array<PointsAward> $awards Array of trigger awards that added points.
     */
    #[JsonProperty('awards'), ArrayType([PointsAward::class])]
    public ?array $awards;

    /**
     * @param array{
     *   total?: ?float,
     *   awards?: ?array<PointsAward>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
