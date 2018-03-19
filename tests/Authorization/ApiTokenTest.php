<?php

namespace DMT\Test\Auth\Authorization;

use DMT\Auth\Authorization\ApiToken;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * Class ApiTokenTest
 *
 * @package DMT\Auth
 */
class ApiTokenTest extends TestCase
{
    /**
     * Test both default and custom api key.
     */
    public function testApiToken()
    {
        static::assertSame(
            'H123b%',
            (new ApiToken('H123b%'))
                ->handle(new Request('GET', '/'))
                ->getHeaderLine('X-API-Key')
        );

        static::assertSame(
            'H123b%',
            (new ApiToken('H123b%', 'X-API-Key-Example'))
                ->handle(new Request('GET', '/'))
                ->getHeaderLine('X-API-Key-Example')
        );
    }
}
