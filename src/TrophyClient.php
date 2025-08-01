<?php

namespace Trophy;

use Trophy\Achievements\AchievementsClient;
use Trophy\Metrics\MetricsClient;
use Trophy\Users\UsersClient;
use Trophy\Points\PointsClient;
use GuzzleHttp\ClientInterface;
use Trophy\Core\Client\RawClient;

class TrophyClient
{
    /**
     * @var AchievementsClient $achievements
     */
    public AchievementsClient $achievements;

    /**
     * @var MetricsClient $metrics
     */
    public MetricsClient $metrics;

    /**
     * @var UsersClient $users
     */
    public UsersClient $users;

    /**
     * @var PointsClient $points
     */
    public PointsClient $points;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   headers?: array<string, string>,
     *   maxRetries?: int,
     * } $options
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param string $apiKey The apiKey to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   headers?: array<string, string>,
     *   maxRetries?: int,
     * } $options
     */
    public function __construct(
        string $apiKey,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'X-API-KEY' => $apiKey,
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Trophy',
        ];

        $this->options = $options ?? [];
        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->achievements = new AchievementsClient($this->client, $this->options);
        $this->metrics = new MetricsClient($this->client, $this->options);
        $this->users = new UsersClient($this->client, $this->options);
        $this->points = new PointsClient($this->client, $this->options);
    }
}
