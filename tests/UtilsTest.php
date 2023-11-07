<?php

namespace Metarisc\Test;

use Metarisc\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    public function testReplacementWithInteger() : void
    {
        $val   = 2;
        $table = ['name' => $val];
        $path  = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), 'https://github.com/{name}');

        self::assertSame('https://github.com/2', $path);
    }

    public function testReplacementWithStringAndInteger() : void
    {
        $val   = 'john';
        $age   = 20;
        $table = [
            'name' => $val,
            'age'  => $age,
        ];
        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), 'https://github.com/{name}/{age}');

        self::assertSame('https://github.com/john/20', $path);
    }

    public function testReplacementWith3VarEntrance() : void
    {
        $val      = 'john';
        $lastName = 'Micheal';
        $age      = 20;
        $table    = [
            'name'     => $val,
            'lastName' => $lastName,
            'age'      => $age,
        ];
        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), 'https://github.com/{name}/france/{lastName}/now/{age}');

        self::assertSame('https://github.com/john/france/Micheal/now/20', $path);
    }
}
