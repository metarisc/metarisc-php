<?php

namespace Metarisc\Model;

abstract class ModelAbstract
{
    abstract public static function unserialize(array $data) : self;
}
