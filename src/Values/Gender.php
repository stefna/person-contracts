<?php declare(strict_types=1);

namespace Stefna\PersonContract\Values;

enum Gender: string
{
	case Man = '1';
	case Woman = '2';

	public function toString(): string
	{
		return $this->value;
	}
}
