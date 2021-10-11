<?php declare(strict_types=1);

namespace Stefna\PersonContract\Entities;

use Stefna\PersonContract\Values\Gender;

interface PersonWithDoB extends Person
{
	public function getGender(): Gender;

	public function getDateOfBirth(): \DateTimeImmutable;
}
