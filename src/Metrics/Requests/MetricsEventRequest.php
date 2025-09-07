<?php

namespace Trophy\Metrics\Requests;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Types\UpsertedUser;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

class MetricsEventRequest extends JsonSerializableType
{
    /**
     * @var ?string $idempotencyKey The idempotency key for the event.
     */
    public ?string $idempotencyKey;

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
     * @var ?array<string, string> $attributes Event attributes as key-value pairs. Keys must match existing event attributes set up in the Trophy dashboard.
     */
    #[JsonProperty('attributes'), ArrayType(['string' => 'string'])]
    public ?array $attributes;

    /**
     * @param array{
     *   idempotencyKey?: ?string,
     *   user: UpsertedUser,
     *   value: float,
     *   attributes?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->user = $values['user'];
        $this->value = $values['value'];
        $this->attributes = $values['attributes'] ?? null;
    }
}
