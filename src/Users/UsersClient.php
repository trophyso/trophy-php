<?php

namespace Trophy\Users;

use GuzzleHttp\ClientInterface;
use Trophy\Core\Client\RawClient;
use Trophy\Types\UpsertedUser;
use Trophy\Types\User;
use Trophy\Exceptions\TrophyException;
use Trophy\Exceptions\TrophyApiException;
use Trophy\Core\Json\JsonApiRequest;
use Trophy\Environments;
use Trophy\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Trophy\Types\UpdatedUser;
use Trophy\Types\MetricResponse;
use Trophy\Core\Json\JsonDecoder;
use Trophy\Types\AchievementResponse;

class UsersClient
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
     * Create a new user.
     *
     * @param UpsertedUser $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return User
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function create(UpsertedUser $request, ?array $options = null): User
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "users",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return User::fromJson($json);
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
     * Get a single user.
     *
     * @param string $id ID of the user to get.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return User
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function get(string $id, ?array $options = null): User
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "users/$id",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return User::fromJson($json);
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
     * Update a user.
     *
     * @param string $id ID of the user to update.
     * @param UpdatedUser $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return User
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function update(string $id, UpdatedUser $request, ?array $options = null): User
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "users/$id",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return User::fromJson($json);
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
     * Get a single user's progress against all active metrics.
     *
     * @param string $id ID of the user
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return array<MetricResponse>
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function allmetrics(string $id, ?array $options = null): array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "users/$id/metrics",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [MetricResponse::class]); // @phpstan-ignore-line
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
     * Get a user's progress against a single active metric.
     *
     * @param string $id ID of the user.
     * @param string $key Unique key of the metric.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return MetricResponse
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function singlemetric(string $id, string $key, ?array $options = null): MetricResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "users/$id/metrics/$key",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return MetricResponse::fromJson($json);
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
     * Get all of a user's completed achievements.
     *
     * @param string $id ID of the user.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     * } $options
     * @return array<AchievementResponse>
     * @throws TrophyException
     * @throws TrophyApiException
     */
    public function allachievements(string $id, ?array $options = null): array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "users/$id/achievements",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [AchievementResponse::class]); // @phpstan-ignore-line
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
