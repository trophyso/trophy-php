<?php

namespace Trophy\Users\Requests;

use Trophy\Core\Json\JsonSerializableType;

class UsersStreakRequest extends JsonSerializableType
{
    /**
     * @var ?int $historyPeriods The number of past streak periods to include in the streakHistory field of the  response.
     */
    public ?int $historyPeriods;

    /**
     * @param array{
     *   historyPeriods?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->historyPeriods = $values['historyPeriods'] ?? null;
    }
}
