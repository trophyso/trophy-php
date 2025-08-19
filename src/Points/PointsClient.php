<?php

namespace Trophy\Points;

use GuzzleHttp\ClientInterface;
use Trophy\Core\Client\RawClient;
use Trophy\Points\Requests\PointsSummaryRequest;
use Trophy\Types\PointsRange;
use Trophy\Exceptions\TrophyException;
use Trophy\Exceptions\TrophyApiException;
use Trophy\Core\Json\JsonApiRequest;
use Trophy\Environments;
use Trophy\Core\Client\HttpMethod;
use Trophy\Core\Json\JsonDecoder;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Trophy\Types\PointsSystemResponse;

class PointsClient
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
     * Get a breakdown of the number of users with points in each range.
     *
     * @param string $key Key of the points system.
     * @param PointsSummaryRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return array<PointsRange>
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function summary(string $key, PointsSummaryRequest $request, ?array $options = null): array
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->userAttributes != null) {
            $query['userAttributes'] = $request->userAttributes;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "points/$key/summary",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [PointsRange::class]); // @phpstan-ignore-line
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
     * Get a points system with all its triggers.
     *
     * @param string $key Key of the points system.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return PointsSystemResponse
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function system(string $key, ?array $options = null): PointsSystemResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "points/$key",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return PointsSystemResponse::fromJson($json);
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
