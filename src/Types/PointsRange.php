<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

class PointsRange extends JsonSerializableType
{
    /**
     * @var ?float $from The start of the points range. Inclusive.
     */
    #[JsonProperty('from')]
    public ?float $from;

    /**
     * @var ?float $to The end of the points range. Inclusive.
     */
    #[JsonProperty('to')]
    public ?float $to;

    /**
     * @var ?float $users The number of users in this points range.
     */
    #[JsonProperty('users')]
    public ?float $users;

    /**
     * @param array{
     *   from?: ?float,
     *   to?: ?float,
     *   users?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->from = $values['from'] ?? null;
        $this->to = $values['to'] ?? null;
        $this->users = $values['users'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
