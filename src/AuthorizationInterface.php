<?php

namespace DMT\Auth;

/**
 * Interface AuthorizationInterface
 *
 * @package DMT\Auth
 */
interface AuthorizationInterface
{
    /**
     * Get the http headers associated with the authorization.
     *
     * @return array
     */
    public function getHeaders(): array;
}