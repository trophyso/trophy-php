<?php

namespace Trophy\Types;

use Trophy\Core\Json\JsonSerializableType;
use Trophy\Traits\BaseStreakResponse;
use Trophy\Core\Json\JsonProperty;
use Trophy\Core\Types\ArrayType;

/**
 * An object representing the user's streak.
 */
class StreakResponse extends JsonSerializableType
{
    use BaseStreakResponse;

    /**
     * @var ?array<StreakResponseStreakHistoryItem> $streakHistory A list of the user's past streak periods up through the current period. Each period includes the start and end dates and the length of the streak.
     */
    #[JsonProperty('streakHistory'), ArrayType([StreakResponseStreakHistoryItem::class])]
    public ?array $streakHistory;

    /**
     * @var ?int $rank The user's rank across all users. Null if the user has no active streak.
     */
    #[JsonProperty('rank')]
    public ?int $rank;

    /**
     * @param array{
     *   streakHistory?: ?array<StreakResponseStreakHistoryItem>,
     *   rank?: ?int,
     *   length: int,
     *   frequency: value-of<StreakFrequency>,
     *   started?: ?string,
     *   periodStart?: ?string,
     *   periodEnd?: ?string,
     *   expires?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->streakHistory = $values['streakHistory'] ?? null;
        $this->rank = $values['rank'] ?? null;
        $this->length = $values['length'];
        $this->frequency = $values['frequency'];
        $this->started = $values['started'] ?? null;
        $this->periodStart = $values['periodStart'] ?? null;
        $this->periodEnd = $values['periodEnd'] ?? null;
        $this->expires = $values['expires'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
