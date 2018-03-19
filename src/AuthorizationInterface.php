<?php

namespace DMT\Auth;

use Psr\Http\Message\RequestInterface;

/**
 * Interface AuthorizationInterface
 *
 * @package DMT\Auth
 */
interface AuthorizationInterface
{
    /**
     * Get a request with the headers associated with the authorization.
     *
     * @param RequestInterface $request
     * @return RequestInterface
     */
    public function handle(RequestInterface $request): RequestInterface;
}