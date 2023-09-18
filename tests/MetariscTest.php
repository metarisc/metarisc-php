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
}
