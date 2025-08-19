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
     *   id: string,
     *   name: string,
     *   description?: ?string,
     *   badgeUrl?: ?string,
     *   total: float,
     *   awards: array<PointsAward>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->added = $values['added'] ?? null;
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->badgeUrl = $values['badgeUrl'] ?? null;
        $this->total = $values['total'];
        $this->awards = $values['awards'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
