<?php

namespace Trophy\Leaderboards\Requests;

use Trophy\Core\Json\JsonSerializableType;

class LeaderboardsGetRequest extends JsonSerializableType
{
    /**
     * @var ?int $offset Number of rankings to skip for pagination.
     */
    public ?int $offset;

    /**
     * @var ?int $limit Maximum number of rankings to return.
     */
    public ?int $limit;

    /**
     * @var ?string $run Specific run date in YYYY-MM-DD format. If not provided, returns the current run.
     */
    public ?string $run;

    /**
     * @var ?string $userId When provided, offset is relative to this user's position on the leaderboard. If the user is not found in the leaderboard, returns empty rankings array.
     */
    public ?string $userId;

    /**
     * @param array{
     *   offset?: ?int,
     *   limit?: ?int,
     *   run?: ?string,
     *   userId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->offset = $values['offset'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->run = $values['run'] ?? null;
        $this->userId = $values['userId'] ?? null;
    }
}
