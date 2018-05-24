<?php

namespace DMT\Auth\Authorization;

use DMT\Auth\AuthorizationException;
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
     * @static string
     */
    const DEFAULT_API_KEY = 'X-API-Key';

    /**
     * @var string
     */
    protected $key = self::DEFAULT_API_KEY;

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
    public function __construct(string $token, string $key = self::DEFAULT_API_KEY)
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
        if ($this->token === '' || $this->key === '') {
            throw new AuthorizationException('Could not create api token, missing or empty arguments');
        }
        return $request->withHeader($this->key, $this->token);
    }
}
