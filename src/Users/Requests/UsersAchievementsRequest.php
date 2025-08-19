<?php

namespace Trophy\Users\Requests;

use Trophy\Core\Json\JsonSerializableType;

class UsersAchievementsRequest extends JsonSerializableType
{
    /**
     * @var ?string $includeIncomplete When set to 'true', returns both completed and incomplete achievements for the user. When omitted or set to any other value, returns only completed achievements.
     */
    public ?string $includeIncomplete;

    /**
     * @param array{
     *   includeIncomplete?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeIncomplete = $values['includeIncomplete'] ?? null;
    }
}
