<?php

namespace Trophy\Achievements\Requests;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Types\UpsertedUser;
use Trophy\Core\Json\JsonProperty;

class AchievementsCompleteRequest extends JsonSerializableType
{
    /**
     * @var UpsertedUser $user The user that completed the achievement.
     */
    #[JsonProperty('user')]
    public UpsertedUser $user;

    /**
     * @param array{
     *   user: UpsertedUser,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->user = $values['user'];
    }
}
