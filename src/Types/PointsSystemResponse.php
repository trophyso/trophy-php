<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

class PointsSystemResponse extends JsonSerializableType
{
    /**
     * @var string $id The unique ID of the points system.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name The name of the points system.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $description The description of the points system.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $badgeUrl The URL of the badge image for the points system, if one has been uploaded.
     */
    #[JsonProperty('badgeUrl')]
    public ?string $badgeUrl;

    /**
     * @var array<PointsTriggerResponse> $triggers Array of active triggers for this points system.
     */
    #[JsonProperty('triggers'), ArrayType([PointsTriggerResponse::class])]
    public array $triggers;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   description?: ?string,
     *   badgeUrl?: ?string,
     *   triggers: array<PointsTriggerResponse>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->badgeUrl = $values['badgeUrl'] ?? null;
        $this->triggers = $values['triggers'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
