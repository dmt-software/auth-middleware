<?php

namespace DMT\Auth\Authorization;

use DMT\Auth\AuthorizationInterface;
use Psr\Http\Message\RequestInterface;

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
     * Get the http headers associated with the authorization.
     *
     * @param RequestInterface $request
     * @return RequestInterface
     */
    public function handle(RequestInterface $request): RequestInterface
    {
        return
            $request->withHeader(
                'Authorization',
                sprintf('Basic %s', base64_encode(sprintf('%s:%s', $this->user, $this->password)))
            );
    }
}
