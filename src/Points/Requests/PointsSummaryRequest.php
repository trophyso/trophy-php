<?php

namespace Trophy\Points\Requests;

use Trophy\Core\Json\JsonSerializableType;

class PointsSummaryRequest extends JsonSerializableType
{
    /**
     * @var ?string $userAttributes Optional colon-delimited user attribute filters in the format attributeKey:value,attributeKey:value. Only users matching ALL specified attributes will be included in the points breakdown.
     */
    public ?string $userAttributes;

    /**
     * @param array{
     *   userAttributes?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->userAttributes = $values['userAttributes'] ?? null;
    }
}
