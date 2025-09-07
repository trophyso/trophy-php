<?php

namespace Trophy\Metrics;

use GuzzleHttp\ClientInterface;
use Trophy\Core\Client\RawClient;
use Trophy\Metrics\Requests\MetricsEventRequest;
use Trophy\Types\EventResponse;
use Trophy\Exceptions\TrophyException;
use Trophy\Exceptions\TrophyApiException;
use Trophy\Core\Json\JsonApiRequest;
use Trophy\Environments;
use Trophy\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;

class MetricsClient
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
     * Increment or decrement the value of a metric for a user.
     *
     * @param string $key Unique reference of the metric as set when created.
     * @param MetricsEventRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return EventResponse
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function event(string $key, MetricsEventRequest $request, ?array $options = null): EventResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $headers = [];
        if ($request->idempotencyKey != null) {
            $headers['Idempotency-Key'] = $request->idempotencyKey;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics/$key/event",
                    method: HttpMethod::POST,
                    headers: $headers,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return EventResponse::fromJson($json);
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
