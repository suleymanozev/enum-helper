<?php

declare(strict_types=1);

use Suleymanozev\EnumHelper\Exceptions\InvalidUniqueId;
use Suleymanozev\EnumHelper\Tests\Support\Enums\IntBackedEnum;
use Suleymanozev\EnumHelper\Tests\Support\Enums\PascalCasePureEnum;
use Suleymanozev\EnumHelper\Tests\Support\Enums\PureEnum;
use Suleymanozev\EnumHelper\Tests\Support\Enums\StringBackedEnum;

it('can have a unique identifier string', function ($enum, $result) {
    expect($enum->uniqueId())->toBe($result);
})->with([
    'Pure Enum' => [PureEnum::PENDING, 'Suleymanozev\EnumHelper\Tests\Support\Enums\PureEnum.PENDING'],
    'Int Backed Enum' => [IntBackedEnum::PENDING, 'Suleymanozev\EnumHelper\Tests\Support\Enums\IntBackedEnum.PENDING'],
    'String Backed Enum' => [StringBackedEnum::PENDING, 'Suleymanozev\EnumHelper\Tests\Support\Enums\StringBackedEnum.PENDING'],
    'Pascal Case Enum' => [PascalCasePureEnum::Pending, 'Suleymanozev\EnumHelper\Tests\Support\Enums\PascalCasePureEnum.Pending'],
]);

it('can get an instance from correct identifier', function ($enumClass, $uniqueId, $result) {
    expect($enumClass::fromUniqueId($uniqueId))->toBe($result);
})->with([
    [PureEnum::class, 'Suleymanozev\EnumHelper\Tests\Support\Enums\PureEnum.PENDING', PureEnum::PENDING],
    [IntBackedEnum::class, 'Suleymanozev\EnumHelper\Tests\Support\Enums\IntBackedEnum.PENDING', IntBackedEnum::PENDING],
    [StringBackedEnum::class, 'Suleymanozev\EnumHelper\Tests\Support\Enums\StringBackedEnum.PENDING', StringBackedEnum::PENDING],
]);

it('throw an exception with wrong uniqueId format', function ($enumClass, $uniqueId) {
    expect(fn () => $enumClass::fromUniqueId($uniqueId))->toThrow(InvalidUniqueId::class, "UniqueId '$uniqueId' has an invalid format");
})->with([
    [PureEnum::class, 'Enums\Station'],
    [IntBackedEnum::class, 'IntBackedEnum.PENDING.PENDING'],
]);

it('throw an exception with wrong namespace or class name', function ($enumClass, $uniqueId) {
    expect(fn () => $enumClass::fromUniqueId($uniqueId))->toThrow(InvalidUniqueId::class, "UniqueId '$uniqueId' has a wrong Namespace or Class name");
})->with([
    [PureEnum::class, 'Enums\PureEnum.PENDING'],
    [IntBackedEnum::class, 'Wrong\Namespace\IntBackedEnum.PENDING'],
]);

it('throw an exception with wrong case name', function ($enumClass, $uniqueId) {
    expect(fn () => $enumClass::fromUniqueId($uniqueId))->toThrow(InvalidUniqueId::class, "There is not 'MISSING' case on the enum");
})->with([
    [PureEnum::class, 'Suleymanozev\EnumHelper\Tests\Support\Enums\PureEnum.MISSING'],
    [IntBackedEnum::class, 'Suleymanozev\EnumHelper\Tests\Support\Enums\IntBackedEnum.MISSING'],
]);
