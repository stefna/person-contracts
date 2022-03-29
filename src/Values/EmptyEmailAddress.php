<?php declare(strict_types=1);

namespace Stefna\PersonContract\Values;

final class EmptyEmailAddress implements EmailAddress, \JsonSerializable
{
	public function getEmail(): string
	{
		return '';
	}

	public function jsonSerialize(): string
	{
		return '';
	}
}
