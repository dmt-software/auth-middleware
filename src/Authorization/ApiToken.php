<?php

namespace DMT\Auth\Authorization;

use DMT\Auth\AuthorizationInterface;

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
     * @inheritdoc
     */
    public function getHeaders(): array
    {
        return [$this->key => $this->token];
    }
}