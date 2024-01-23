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
 * @method static string INVALID()
 */
enum PureEnum
{
    use EnumDescription;
    use EnumHelper;
    use EnumUniqueId;

    case PENDING;

    case ACCEPTED;

    case DISCARDED;

    case NO_RESPONSE;

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
