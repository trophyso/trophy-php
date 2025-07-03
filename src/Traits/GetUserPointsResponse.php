<?php

namespace Trophy\Traits;

use Trophy\Core\Json\JsonProperty;
use Trophy\Types\PointsAward;
use Trophy\Core\Types\ArrayType;

trait GetUserPointsResponse
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
}
