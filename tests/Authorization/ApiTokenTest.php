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
     * @dataProvider provideApiTokens
     *
     * @param ApiToken $token
     * @param array $headers
     */
    public function testApiToken(ApiToken $token, array $headers)
    {
        static::assertSame($headers, $token->getHeaders());
    }

    /**
     * @return array
     */
    public function provideApiTokens(): array
    {
        return [
            [new ApiToken('H123b%'), ['X-API-Key' => 'H123b%']],
            [new ApiToken('H123b%', 'X-API-Key-Example'), ['X-API-Key-Example' => 'H123b%']],
        ];
    }
}
