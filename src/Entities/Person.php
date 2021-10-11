<?php declare(strict_types=1);

namespace Stefna\PersonContract\Entities;

use Stefna\PersonContract\Values\Ssn;

interface Person
{
	public function getName(): string;

	public function getSsn(): Ssn;
}
