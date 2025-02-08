<?php

namespace Trophy\Core\Json;

use Trophy\Core\Client\BaseApiRequest;
use Trophy\Core\Client\HttpMethod;

class JsonApiRequest extends BaseApiRequest
{
    /**
     * @param string $baseUrl The base URL for the request
     * @param string $path The path for the request
     * @param HttpMethod $method The HTTP method for the request
     * @param array<string, string> $headers Additional headers for the request (optional)
     * @param array<string, mixed> $query Query parameters for the request (optional)
     * @param mixed|null $body The JSON request body (optional)
     */
    public function __construct(
        string $baseUrl,
        string $path,
        HttpMethod $method,
        array $headers = [],
        array $query = [],
        public readonly mixed $body = null
    ) {
        parent::__construct($baseUrl, $path, $method, $headers, $query);
    }
}
