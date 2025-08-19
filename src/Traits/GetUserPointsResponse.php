<?php

namespace Trophy\Traits;

use Trophy\Core\Json\JsonProperty;
use Trophy\Types\PointsAward;
use Trophy\Core\Types\ArrayType;

trait GetUserPointsResponse
{
    /**
     * @var string $id The ID of the points system
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name The name of the points system
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $description The description of the points system
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $badgeUrl The URL of the badge image for the points system
     */
    #[JsonProperty('badgeUrl')]
    public ?string $badgeUrl;

    /**
     * @var float $total The user's total points
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var array<PointsAward> $awards Array of trigger awards that added points.
     */
    #[JsonProperty('awards'), ArrayType([PointsAward::class])]
    public array $awards;
}
