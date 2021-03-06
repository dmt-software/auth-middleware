<?php

namespace DMT\Auth;

use Psr\Http\Message\RequestInterface;

/**
 * Class AuthorizationMiddleware
 *
 * @package DMT\Auth
 */
class AuthorizationMiddleware
{
    /**
     * @var AuthorizationInterface
     */
    protected $authorization;

    /**
     * AuthorizationMiddleware constructor.
     *
     * @param AuthorizationInterface $authorization
     */
    public function __construct(AuthorizationInterface $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * Apply the authorization headers to the request.
     *
     * @param RequestInterface $request
     *
     * @return RequestInterface
     * @throws AuthorizationException
     */
    public function __invoke(RequestInterface $request)
    {
        return $this->authorization->handle($request);
    }
}
