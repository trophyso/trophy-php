<?php

namespace Trophy\Streaks\Requests;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Streaks\Types\StreaksRankingsRequestType;

class StreaksRankingsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Number of users to return. Must be between 1 and 100.
     */
    public ?int $limit;

    /**
     * @var ?value-of<StreaksRankingsRequestType> $type Whether to rank users by active streaks or longest streaks ever achieved.
     */
    public ?string $type;

    /**
     * @param array{
     *   limit?: ?int,
     *   type?: ?value-of<StreaksRankingsRequestType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->type = $values['type'] ?? null;
    }
}
