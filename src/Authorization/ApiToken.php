<?php

namespace DMT\Auth\Authorization;

use DMT\Auth\AuthorizationInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Class ApiToken
 *
 * @package DMT\Auth
 */
class ApiToken implements AuthorizationInterface
{
    /**
     * @var string
     */
    protected $key = 'X-API-Key';

    /**
     * @var string
     */
    protected $token;

    /**
     * ApiToken constructor.
     *
     * @param string $key
     * @param string $token
     */
    public function __construct(string $token, string $key = 'X-API-Key')
    {
        $this->token = $token;
        $this->key = $key;
    }

    /**
     * Get a request with the headers associated with the authorization.
     *
     * @param RequestInterface $request
     * @return RequestInterface
     */
    public function handle(RequestInterface $request): RequestInterface
    {
        return $request->withHeader($this->key, $this->token);
    }
}