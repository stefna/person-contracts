<?php declare(strict_types=1);

namespace Stefna\PersonContract\Entities;

final readonly class SimpleAddress implements Address
{
	public function __construct(
		private string $city,
		private string $zipCode,
		private string $address
	) {}

	public function getZipCode(): string
	{
		return $this->zipCode;
	}

	public function getCity(): string
	{
		return $this->city;
	}

	public function getStreetAddress(): string
	{
		return $this->address;
	}
}
