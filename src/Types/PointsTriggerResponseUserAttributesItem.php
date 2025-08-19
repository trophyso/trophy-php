<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;

class PointsTriggerResponseUserAttributesItem extends JsonSerializableType
{
    /**
     * @var string $key The key of the user attribute.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $value The value of the user attribute.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   key: string,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
