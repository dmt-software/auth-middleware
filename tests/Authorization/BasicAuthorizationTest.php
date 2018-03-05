<?php

namespace DMT\Test\Auth\Authorization;

use DMT\Auth\Authorization\BasicAuthorization;
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
            ['Authorization' => 'Basic X191c2VyX186X19wYXNzd29yZF9f'],
            (new BasicAuthorization('__user__', '__password__'))->getHeaders()
        );
    }
}
