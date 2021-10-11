<?php declare(strict_types=1);

namespace Stefna\PersonContract\Entities;

use Stefna\PersonContract\Values\Gender;
use Stefna\PersonContract\Values\Ssn;

interface Person
{
	public function getGender(): Gender;

	public function getName(): string;

	public function getSsn(): Ssn;

	public function getAddress(): Address;

	public function getMunicipalCode(): string;

	public function getDateOfBirth(): \DateTimeImmutable;
}
