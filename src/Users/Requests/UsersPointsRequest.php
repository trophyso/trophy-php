<?php

namespace Trophy\Users\Requests;

use Trophy\Core\Json\JsonSerializableType;

class UsersPointsRequest extends JsonSerializableType
{
    /**
     * @var ?int $awards The number of recent point awards to return.
     */
    public ?int $awards;

    /**
     * @param array{
     *   awards?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->awards = $values['awards'] ?? null;
    }
}
