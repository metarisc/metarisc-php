<?php

namespace Metarisc\Model;

class PatchPoiRequest
{
    private ?string $test = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['test'] */
        $object->setTest($data['test']);

        return $object;
    }

    public function getTest() : ?string
    {
        return $this->test;
    }

    public function setTest(string $test = null) : void
    {
        $this->test=$test;
    }
}
