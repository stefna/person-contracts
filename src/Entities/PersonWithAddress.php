<?php declare(strict_types=1);

namespace Stefna\PersonContract\Entities;

interface PersonWithAddress
{
	public function getAddress(): Address;

	public function getMunicipalCode(): string;
}
