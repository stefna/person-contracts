<?php declare(strict_types=1);

namespace Stefna\PersonContract\Values;

use Sunkan\Enum\EnumClass;

/**
 * @method static Gender MAN()
 * @method static Gender WOMAN()
 */
final class Gender extends EnumClass
{
	public const MAN = '1';
	public const WOMAN = '2';
}
