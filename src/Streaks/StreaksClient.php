<?php

namespace Trophy\Streaks;

use GuzzleHttp\ClientInterface;
use Trophy\Core\Client\RawClient;
use Trophy\Streaks\Requests\StreaksListRequest;
use Trophy\Types\BulkStreakResponseItem;
use Trophy\Exceptions\TrophyException;
use Trophy\Exceptions\TrophyApiException;
use Trophy\Core\Json\JsonApiRequest;
use Trophy\Environments;
use Trophy\Core\Client\HttpMethod;
use Trophy\Core\Json\JsonDecoder;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Trophy\Streaks\Requests\StreaksRankingsRequest;
use Trophy\Types\StreakRankingUser;

class StreaksClient
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
     * Get the streak lengths of a list of users, ranked by streak length from longest to shortest.
     *
     * @param StreaksListRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return array<BulkStreakResponseItem>
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function list(StreaksListRequest $request, ?array $options = null): array
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->userIds != null) {
            $query['userIds'] = $request->userIds;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "streaks",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [BulkStreakResponseItem::class]); // @phpstan-ignore-line
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
     * Get the top users by streak length (active or longest).
     *
     * @param StreaksRankingsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return array<StreakRankingUser>
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function rankings(StreaksRankingsRequest $request, ?array $options = null): array
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->type != null) {
            $query['type'] = $request->type;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "streaks/rankings",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [StreakRankingUser::class]); // @phpstan-ignore-line
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
