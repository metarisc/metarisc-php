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
            'metarisc_url' => 'https://metarisc.dev',
        ]);

        $this->assertInstanceOf(MetariscAbstract::class, $client);
    }
}
