<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;
use DateTime;
use Trophy\Core\Types\Date;

class PointsTriggerResponse extends JsonSerializableType
{
    /**
     * @var ?string $id The unique ID of the trigger.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?value-of<PointsTriggerResponseType> $type The type of trigger.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?float $points The points awarded by this trigger.
     */
    #[JsonProperty('points')]
    public ?float $points;

    /**
     * @var ?value-of<PointsTriggerResponseStatus> $status The status of the trigger.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $achievementId The unique ID of the achievement associated with this trigger, if the trigger is an achievement.
     */
    #[JsonProperty('achievementId')]
    public ?string $achievementId;

    /**
     * @var ?string $metricId The unique ID of the metric associated with this trigger, if the trigger is a metric.
     */
    #[JsonProperty('metricId')]
    public ?string $metricId;

    /**
     * @var ?float $metricThreshold The amount that a user must increase the metric to earn the points, if the trigger is a metric.
     */
    #[JsonProperty('metricThreshold')]
    public ?float $metricThreshold;

    /**
     * @var ?float $streakLengthThreshold The number of consecutive streak periods that a user must complete to earn the points, if the trigger is a streak.
     */
    #[JsonProperty('streakLengthThreshold')]
    public ?float $streakLengthThreshold;

    /**
     * @var ?string $metricName The name of the metric associated with this trigger, if the trigger is a metric.
     */
    #[JsonProperty('metricName')]
    public ?string $metricName;

    /**
     * @var ?string $achievementName The name of the achievement associated with this trigger, if the trigger is an achievement.
     */
    #[JsonProperty('achievementName')]
    public ?string $achievementName;

    /**
     * @var ?array<PointsTriggerResponseUserAttributesItem> $userAttributes User attribute filters that must be met for this trigger to activate. Only present if the trigger has user attribute filters configured.
     */
    #[JsonProperty('userAttributes'), ArrayType([PointsTriggerResponseUserAttributesItem::class])]
    public ?array $userAttributes;

    /**
     * @var ?PointsTriggerResponseEventAttribute $eventAttribute Event attribute filter that must be met for this trigger to activate. Only present if the trigger has an event filter configured.
     */
    #[JsonProperty('eventAttribute')]
    public ?PointsTriggerResponseEventAttribute $eventAttribute;

    /**
     * @var ?DateTime $created The date and time the trigger was created, in ISO 8601 format.
     */
    #[JsonProperty('created'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $created;

    /**
     * @var ?DateTime $updated The date and time the trigger was last updated, in ISO 8601 format.
     */
    #[JsonProperty('updated'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updated;

    /**
     * @param array{
     *   id?: ?string,
     *   type?: ?value-of<PointsTriggerResponseType>,
     *   points?: ?float,
     *   status?: ?value-of<PointsTriggerResponseStatus>,
     *   achievementId?: ?string,
     *   metricId?: ?string,
     *   metricThreshold?: ?float,
     *   streakLengthThreshold?: ?float,
     *   metricName?: ?string,
     *   achievementName?: ?string,
     *   userAttributes?: ?array<PointsTriggerResponseUserAttributesItem>,
     *   eventAttribute?: ?PointsTriggerResponseEventAttribute,
     *   created?: ?DateTime,
     *   updated?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->points = $values['points'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->achievementId = $values['achievementId'] ?? null;
        $this->metricId = $values['metricId'] ?? null;
        $this->metricThreshold = $values['metricThreshold'] ?? null;
        $this->streakLengthThreshold = $values['streakLengthThreshold'] ?? null;
        $this->metricName = $values['metricName'] ?? null;
        $this->achievementName = $values['achievementName'] ?? null;
        $this->userAttributes = $values['userAttributes'] ?? null;
        $this->eventAttribute = $values['eventAttribute'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->updated = $values['updated'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
