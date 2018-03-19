<?php

namespace DMT\Test\Auth;

use DMT\Auth\AuthorizationInterface;
use DMT\Auth\AuthorizationMiddleware;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class AuthorizationMiddlewareTest
 *
 * @package DMT\Auth
 */
class AuthorizationMiddlewareTest extends TestCase
{
    /**
     * @dataProvider provideHeaders
     *
     * @param array $headers
     */
    public function testAuthorizationHeaders(array $headers)
    {
        /** @var AuthorizationInterface|MockObject $auth */
        $auth = static::getMockForAbstractClass(AuthorizationInterface::class);
        $auth->expects(static::once())
            ->method('handle')
            ->willReturn((new Request('GET', 'http://localhost', $headers)));

        /** @var Request $request */
        $request = call_user_func(new AuthorizationMiddleware($auth), new Request('GET', 'http://localhost'));

        foreach ($headers as $header => $expected) {
            static::assertSame($expected, $request->getHeaderLine($header));
        }
    }

    public function provideHeaders(): array
    {
        return [
            [['Authorization' => 'Basic dXNlcjpwYXNz']],
            [['X-API-Key' => '13af8732cc7daae8027bc682d']],
            [['X-Auth-Type' => 'hash', 'Hash-id' => '13af8732cc7daae8027bc682d']],
        ];
    }
}
