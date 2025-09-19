<?php

namespace Trophy\Users\Requests;

use Trophy\Core\Json\JsonSerializableType;

class UsersLeaderboardsRequest extends JsonSerializableType
{
    /**
     * @var ?string $run Specific run date in YYYY-MM-DD format. If not provided, returns the current run.
     */
    public ?string $run;

    /**
     * @param array{
     *   run?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->run = $values['run'] ?? null;
    }
}
