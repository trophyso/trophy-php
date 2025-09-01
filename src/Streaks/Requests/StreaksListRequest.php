<?php

namespace Trophy\Streaks\Requests;

use Trophy\Core\Json\JsonSerializableType;

class StreaksListRequest extends JsonSerializableType
{
    /**
     * @var array<?string> $userIds A list of up to 100 user IDs.
     */
    public array $userIds;

    /**
     * @param array{
     *   userIds: array<?string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->userIds = $values['userIds'];
    }
}
