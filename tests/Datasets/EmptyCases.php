<?php

declare(strict_types=1);

use Suleymanozev\EnumHelper\Tests\Support\Enums\EmptyClass;
use Suleymanozev\EnumHelper\Tests\Support\Enums\PureEnum;
use Suleymanozev\EnumHelper\Tests\Support\Enums\StringBackedEnum;

dataset('emptyCases', [
    'pure enum' => [PureEnum::class, []],
    'backed enum' => [StringBackedEnum::class, []],
    'empty cases enum' => [EmptyClass::class, null],
]);
