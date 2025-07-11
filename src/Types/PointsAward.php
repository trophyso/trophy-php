<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

class PointsAward extends JsonSerializableType
{
    /**
     * @var ?string $id The ID of the trigger award
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?float $awarded The points awarded by this trigger
     */
    #[JsonProperty('awarded')]
    public ?float $awarded;

    /**
     * @var ?string $date The date these points were awarded, in ISO 8601 format.
     */
    #[JsonProperty('date')]
    public ?string $date;

    /**
     * @var ?float $total The user's total points after this award occurred.
     */
    #[JsonProperty('total')]
    public ?float $total;

    /**
     * @var ?PointsTrigger $trigger
     */
    #[JsonProperty('trigger')]
    public ?PointsTrigger $trigger;

    /**
     * @param array{
     *   id?: ?string,
     *   awarded?: ?float,
     *   date?: ?string,
     *   total?: ?float,
     *   trigger?: ?PointsTrigger,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->awarded = $values['awarded'] ?? null;
        $this->date = $values['date'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
