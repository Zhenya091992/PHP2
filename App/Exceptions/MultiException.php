<?php

namespace App\Exceptions;

use App\Exceptions\MainException;
use App\traits\MagicTrait;

class MultiException extends MainException implements \ArrayAccess, \Iterator
{
    use MagicTrait;
}
