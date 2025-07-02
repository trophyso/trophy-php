<?php

namespace Trophy\Users\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

class UsersMetricEventSummaryResponseItem extends JsonSerializableType
{
    /**
     * @var string $date The date of the data point. For weekly or monthly aggregations, this is the first date of the period.
     */
    #[JsonProperty('date')]
    public string $date;

    /**
     * @var float $total The user's total for this metric at the end of this date.
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var float $change The change in the user's total for this metric during this period.
     */
    #[JsonProperty('change')]
    public float $change;

    /**
     * @param array{
     *   date: string,
     *   total: float,
     *   change: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->date = $values['date'];
        $this->total = $values['total'];
        $this->change = $values['change'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
