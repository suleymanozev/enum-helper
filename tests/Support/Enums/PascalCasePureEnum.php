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
enum PascalCasePureEnum
{
    use EnumDescription;
    use EnumHelper;
    use EnumUniqueId;

    case Pending;

    case Accepted;

    case Discarded;

    case NoResponse;

    public function description(?string $lang = null): string
    {
        return match ($this) {
            self::Pending => 'Await decision',
            self::Accepted => 'Recognized valid',
            self::Discarded => 'No longer useful',
            self::NoResponse => 'No response',
        };
    }
}
