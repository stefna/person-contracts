<?php declare(strict_types=1);

namespace Stefna\PersonContract\Entities;

interface Address
{
	public function getZipCode(): string;

	public function getCity(): string;

	public function getStreetAddress(): string;
}
