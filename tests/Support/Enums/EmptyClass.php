<?php

declare(strict_types=1);

namespace Suleymanozev\EnumHelper\Tests\Support\Enums;

use Suleymanozev\EnumHelper\EnumHelper;
use Suleymanozev\EnumHelper\Traits\EnumDescription;

enum EmptyClass: string
{
    use EnumDescription;
    use EnumHelper;

    public function description(?string $lang = null): string
    {
        return '';
    }
}
