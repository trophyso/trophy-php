<?php

namespace Trophy\Achievements\Requests;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Types\UpdatedUser;
use Trophy\Core\Json\JsonProperty;

class AchievementsCompleteRequest extends JsonSerializableType
{
    /**
     * @var UpdatedUser $user The user that completed the achievement.
     */
    #[JsonProperty('user')]
    public UpdatedUser $user;

    /**
     * @param array{
     *   user: UpdatedUser,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->user = $values['user'];
    }
}
