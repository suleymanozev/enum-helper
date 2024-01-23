<?php

declare(strict_types=1);

namespace Suleymanozev\EnumHelper;

use Suleymanozev\EnumHelper\Traits\EnumFrom;
use Suleymanozev\EnumHelper\Traits\EnumInspection;
use Suleymanozev\EnumHelper\Traits\EnumInvokable;
use Suleymanozev\EnumHelper\Traits\EnumNames;
use Suleymanozev\EnumHelper\Traits\EnumValues;

trait EnumHelper
{
    use EnumFrom;
    use EnumInspection;
    use EnumInvokable;
    use EnumNames;
    use EnumValues;
}
