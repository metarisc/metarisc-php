<?php

namespace Metarisc\Test\Auth;

use Metarisc\Auth\OAuth2;
use PHPUnit\Framework\TestCase;

class Oauth2Test extends TestCase
{
    public function testOauth2() : void
    {
        $url = OAuth2::authorizeUrl([
            'authorize_url' => 'https://auth_server/auth',
            'client_id'     => 'xx',
        ]);

        $this->assertEquals('https://auth_server/auth?response_type=code&client_id=xx', $url);
    }
}