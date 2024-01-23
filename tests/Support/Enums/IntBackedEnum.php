<?php

declare(strict_types=1);

namespace Suleymanozev\EnumHelper\Tests\Support\Enums;

use Suleymanozev\EnumHelper\EnumHelper;
use Suleymanozev\EnumHelper\Traits\EnumDescription;
use Suleymanozev\EnumHelper\Traits\EnumUniqueId;

/**
 * @method static string pending()
 * @method static string Pending()
 * @method static string PENDING()
 * @method static string noResponse()
 * @method static string NO_RESPONSE()
 * @method static string NoResponse()
 */
enum IntBackedEnum: int
{
    use EnumDescription;
    use EnumHelper;
    use EnumUniqueId;

    case PENDING = 0;

    case ACCEPTED = 1;

    case DISCARDED = 2;

    case NO_RESPONSE = 3;

    public function description(?string $lang = null): string
    {
        return match ($this) {
            self::PENDING => 'Await decision',
            self::ACCEPTED => 'Recognized valid',
            self::DISCARDED => 'No longer useful',
            self::NO_RESPONSE => 'No response',
        };
    }
}
