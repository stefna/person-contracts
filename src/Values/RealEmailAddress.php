<?php declare(strict_types=1);

namespace Stefna\PersonContract\Values;

use Stefna\PersonContract\Exceptions\InvalidEmail;

final class RealEmailAddress implements EmailAddress
{
	public static function fromString(string $email): self
	{
		if (\filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			throw new InvalidEmail();
		}
		return new self($email);
	}

	private function __construct(
		private string $email,
	) {}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function jsonSerialize(): string
	{
		return $this->email;
	}
}
