<?php

namespace Trophy\Metrics\Requests;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Types\UpsertedUser;
use Trophy\Core\Json\JsonProperty;

class MetricsEventRequest extends JsonSerializableType
{
    /**
     * @var UpsertedUser $user The user that triggered the event.
     */
    #[JsonProperty('user')]
    public UpsertedUser $user;

    /**
     * @var float $value The value to add to the user's current total for the given metric.
     */
    #[JsonProperty('value')]
    public float $value;

    /**
     * @param array{
     *   user: UpsertedUser,
     *   value: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->user = $values['user'];
        $this->value = $values['value'];
    }
}
