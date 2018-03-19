<?php

namespace DMT\Test\Auth\Authorization;

use DMT\Auth\Authorization\BasicAuthorization;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * Class BasicAuthorizationTest
 *
 * @package DMT\Auth
 */
class BasicAuthorizationTest extends TestCase
{
    /**
     * Only one thing to test.
     */
    public function testBasicAuthorization()
    {
        static::assertSame(
            'Basic X191c2VyX186X19wYXNzd29yZF9f',
            (new BasicAuthorization('__user__', '__password__'))
                ->handle(new Request('GET', '/'))
                ->getHeaderLine('Authorization')
        );
    }
}
