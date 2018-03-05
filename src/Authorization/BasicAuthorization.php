<?php

namespace DMT\Auth\Authorization;

use DMT\Auth\AuthorizationInterface;

/**
 * Class BasicAuthorization
 *
 * @package DMT\Auth
 */
class BasicAuthorization implements AuthorizationInterface
{
    /**
     * @var string
     */
    protected $user;

    /**
     * @var string
     */
    protected $password;

    /**
     * BasicAuthorization constructor.
     *
     * @param string $user
     * @param string $password
     */
    public function __construct(string $user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @inheritdoc
     */
    public function getHeaders(): array
    {
        return ['Authorization' => sprintf('Basic %s', base64_encode(sprintf('%s:%s', $this->user, $this->password)))];
    }
}