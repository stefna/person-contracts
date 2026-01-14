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

	public function isCompany(): bool
	{
		$firstDigit = (int)($this->ssn[0] ?? -1);
		return in_array($firstDigit, [4, 5, 6, 7], true);
	}

	/**
	 * Person staying in country for 3-6 months
	 *
	 * @link https://www.skra.is/folk/eg-i-thjodskra/um-kennitolur/um-kerfiskennitolur/
	 */
	public function isTemporary(): bool
	{
		$firstDigit = (int)($this->ssn[0] ?? -1);
		return in_array($firstDigit, [8, 9], true);
	}

	public function isPerson(): bool
	{
		$firstDigit = (int)($this->ssn[0] ?? -1);
		return in_array($firstDigit, [0, 1, 2, 3, 8, 9], true);
	}
}
