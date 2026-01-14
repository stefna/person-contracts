<?php declare(strict_types=1);

namespace Stefna\PersonContract\Values;

use Stefna\PersonContract\Exceptions\InvalidSsn;

final readonly class Kennitala implements Ssn, \JsonSerializable
{
	private const KENNITALA_NOT_NUMERIC = 'Invalid kennitala. Provided ssn is not numeric';
	private const KENNITALA_TOO_SHORT = 'Invalid kennitala. Provided ssn is to short. Expected 10 chars';
	private const KENNITALA_TOO_LONG = 'Invalid kennitala. Provided ssn is to long. Expected 10 chars';

	public static function isValid(string $ssn): bool
	{
		$ssn = preg_replace('/\D/', '', $ssn);

		if (!is_numeric($ssn)) {
			throw new InvalidSsn(self::KENNITALA_NOT_NUMERIC);
		}

		if (\strlen($ssn) < 10) {
			throw new InvalidSsn(self::KENNITALA_TOO_SHORT);
		}

		if (\strlen($ssn) > 10) {
			throw new InvalidSsn(self::KENNITALA_TOO_LONG);
		}

		return true;
	}

	public static function fromString(string $ssn): self
	{
		self::isValid($ssn);
		return new self($ssn);
	}

	private function __construct(
		private string $ssn,
	) {}

	public function toString(): string
	{
		return $this->ssn;
	}

	public function jsonSerialize(): string
	{
		return $this->ssn;
	}
}
