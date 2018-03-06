<?php

namespace DMT\Test\Auth\Authorization;

use DMT\Auth\Authorization\ApiToken;
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
            ['X-API-Key' => 'H123b%'],
            (new ApiToken('H123b%'))->getHeaders()
        );

        static::assertSame(
            ['X-API-Key-Example' => 'H123b%'],
            (new ApiToken('H123b%', 'X-API-Key-Example'))->getHeaders()
        );
    }
}
