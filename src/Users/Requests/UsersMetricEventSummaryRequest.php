<?php

namespace Trophy\Users\Requests;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Users\Types\UsersMetricEventSummaryRequestAggregation;

class UsersMetricEventSummaryRequest extends JsonSerializableType
{
    /**
     * @var value-of<UsersMetricEventSummaryRequestAggregation> $aggregation The time period over which to aggregate the event data.
     */
    public string $aggregation;

    /**
     * @var string $startDate The start date for the data range in YYYY-MM-DD format. The startDate must be before the endDate, and the date range must not exceed 400 days.
     */
    public string $startDate;

    /**
     * @var string $endDate The end date for the data range in YYYY-MM-DD format. The endDate must be after the startDate, and the date range must not exceed 400 days.
     */
    public string $endDate;

    /**
     * @param array{
     *   aggregation: value-of<UsersMetricEventSummaryRequestAggregation>,
     *   startDate: string,
     *   endDate: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->aggregation = $values['aggregation'];
        $this->startDate = $values['startDate'];
        $this->endDate = $values['endDate'];
    }
}
