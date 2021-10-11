<?php declare(strict_types=1);

namespace Stefna\PersonContract\Entities;

final class SimpleAddress implements Address
{
	/** @var string */
	private $zipCode;
	/** @var string */
	private $city;
	/** @var string */
	private $address;

	public function __construct(string $city, string $zipCode, string $address)
	{
		$this->city = $city;
		$this->zipCode = $zipCode;
		$this->address = $address;
	}

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
