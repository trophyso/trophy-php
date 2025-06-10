<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\BaseAchievementResponse;
use Trophy\Core\Json\JsonProperty;
use DateTime;

class ApiAchievementResponse extends JsonSerializableType
{
    use BaseAchievementResponse;

    /**
     * @var string $trigger The trigger of the achievement, in this case always 'api'.
     */
    #[JsonProperty('trigger')]
    public string $trigger;

    /**
     * @param array{
     *   trigger: string,
     *   id: string,
     *   name: string,
     *   badgeUrl?: ?string,
     *   key?: ?string,
     *   achievedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->trigger = $values['trigger'];
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->badgeUrl = $values['badgeUrl'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->achievedAt = $values['achievedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
