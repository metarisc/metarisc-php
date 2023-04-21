<?php

namespace Metarisc\Test;

use Metarisc\Metarisc;
use Metarisc\MetariscAbstract;
use PHPUnit\Framework\TestCase;

class MetariscTest extends TestCase
{
    public function testInitialization() : void
    {
        $client = new Metarisc([
            'client_id' => 'xx',
        ]);

        $this->assertInstanceOf(MetariscAbstract::class, $client);
    }

    public function testAuthorizeUrlGenerator() : void
    {
        $url = Metarisc::authorizeUrl([
            'authorize_url' => 'https://auth_server/auth',
            'client_id'     => 'xx',
        ]);

        $this->assertEquals('https://auth_server/auth?response_type=code&client_id=xx', $url);
    }
}
