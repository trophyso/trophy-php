<?php

namespace Trophy\Achievements\Requests;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Types\EventRequestUser;
use Trophy\Core\Json\JsonProperty;

class AchievementsCompleteRequest extends JsonSerializableType
{
    /**
     * @var EventRequestUser $user The user that completed the achievement.
     */
    #[JsonProperty('user')]
    public EventRequestUser $user;

    /**
     * @param array{
     *   user: EventRequestUser,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->user = $values['user'];
    }
}
