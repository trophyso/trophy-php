<?php

namespace Trophy\Leaderboards;

use GuzzleHttp\ClientInterface;
use Trophy\Core\Client\RawClient;
use Trophy\Types\LeaderboardResponse;
use Trophy\Exceptions\TrophyException;
use Trophy\Exceptions\TrophyApiException;
use Trophy\Core\Json\JsonApiRequest;
use Trophy\Environments;
use Trophy\Core\Client\HttpMethod;
use Trophy\Core\Json\JsonDecoder;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Trophy\Leaderboards\Requests\LeaderboardsGetRequest;
use Trophy\Types\LeaderboardResponseWithRankings;
use Trophy\Leaderboards\Requests\UsersLeaderboardsRequest;
use Trophy\Types\UserLeaderboardResponse;

class LeaderboardsClient
{
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
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   headers?: array<string, string>,
     *   maxRetries?: int,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Get all active leaderboards for your organization.
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return array<LeaderboardResponse>
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function all(?array $options = null): array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "leaderboards",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [LeaderboardResponse::class]); // @phpstan-ignore-line
            }
        } catch (JsonException $e) {
            throw new TrophyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TrophyException(message: $e->getMessage(), previous: $e);
            }
            throw new TrophyApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TrophyException(message: $e->getMessage(), previous: $e);
        }
        throw new TrophyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a specific leaderboard by its key.
     *
     * @param string $key Unique key of the leaderboard as set when created.
     * @param LeaderboardsGetRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return LeaderboardResponseWithRankings
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function get(string $key, LeaderboardsGetRequest $request, ?array $options = null): LeaderboardResponseWithRankings
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->run != null) {
            $query['run'] = $request->run;
        }
        if ($request->userId != null) {
            $query['userId'] = $request->userId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "leaderboards/$key",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return LeaderboardResponseWithRankings::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TrophyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TrophyException(message: $e->getMessage(), previous: $e);
            }
            throw new TrophyApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TrophyException(message: $e->getMessage(), previous: $e);
        }
        throw new TrophyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a user's rank, value, and history for a specific leaderboard.
     *
     * @param string $userId The user's ID in your database.
     * @param string $key Unique key of the leaderboard as set when created.
     * @param UsersLeaderboardsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return UserLeaderboardResponse
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function usersLeaderboards(string $userId, string $key, UsersLeaderboardsRequest $request, ?array $options = null): UserLeaderboardResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->run != null) {
            $query['run'] = $request->run;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "users/$userId/leaderboards/$key",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UserLeaderboardResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TrophyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TrophyException(message: $e->getMessage(), previous: $e);
            }
            throw new TrophyApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TrophyException(message: $e->getMessage(), previous: $e);
        }
        throw new TrophyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
