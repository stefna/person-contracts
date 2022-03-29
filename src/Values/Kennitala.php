<?php declare(strict_types=1);

namespace Stefna\PersonContract\Values;

use Stefna\PersonContract\Exceptions\InvalidSsn;

final class Kennitala implements Ssn, \JsonSerializable
{
	private const KENNITALA_INVALID = 'Invalid kennitala';
	private const KENNITALA_NOT_NUMERIC = 'Invalid kennitala. Provided ssn is not numeric';
	private const KENNITALA_TOO_SHORT = 'Invalid kennitala. Provided ssn is to short. Expected 10 chars';
	private const KENNITALA_TOO_LONG = 'Invalid kennitala. Provided ssn is to long. Expected 10 chars';

	private static function validateChecksum(string $value): bool
	{
		$sum = (int)$value[0] * 3;
		$sum += (int)$value[1] * 2;
		$sum += (int)$value[2] * 7;
		$sum += (int)$value[3] * 6;
		$sum += (int)$value[4] * 5;
		$sum += (int)$value[5] * 4;
		$sum += (int)$value[6] * 3;
		$sum += (int)$value[7] * 2;

		$verificationNumber = 11 - ($sum % 11);
		if ($verificationNumber === 11) {
			$verificationNumber = 0;
		}

		return $verificationNumber === (int)$value[8];
	}

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

		if (!self::validateChecksum($ssn)) {
			throw new InvalidSsn(self::KENNITALA_INVALID);
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

	public function jsonSerialize()
	{
		return $this->ssn;
	}
}
