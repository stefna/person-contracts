<?php declare(strict_types=1);

namespace Stefna\PersonContract\Tests;

use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use Stefna\PersonContract\Exceptions\InvalidSsn;
use Stefna\PersonContract\Values\Kennitala;

final class KennitalaTest extends TestCase
{
	#[TestWith(['1012755239'], 'person-1')]
	#[TestWith(['1012755238'], 'person-2')]
	#[TestWith(['5001012880'], 'company-1')]
	#[TestWith(['7002691169'], 'company-2')]
	#[TestWith(['8123456793'], 'system')]
	public function testSimpleValid(string $kenntiala): void
	{
		$this->assertTrue(Kennitala::isValid($kenntiala));
	}

	#[TestWith(['10127552'], 'short')]
	#[TestWith(['101275521234'], 'long')]
	#[TestWith(['non-numer12ic'], 'non-numeric')]
	public function testSimpleInvalid(string $kenntiala): void
	{
		$this->expectException(InvalidSsn::class);
		Kennitala::isValid($kenntiala);
	}

	public function testNew2026Rule(): void
	{
		$this->assertTrue(Kennitala::isValid('1012755249'));
	}

	public function testTemporary(): void
	{
		$kt = Kennitala::fromString('8123456793');

		$this->assertTrue($kt->isPerson());
		$this->assertTrue($kt->isTemporary());
		$this->assertFalse($kt->isCompany());
	}

	public function testPerson(): void
	{
		$kt = Kennitala::fromString('1012755238');

		$this->assertTrue($kt->isPerson());
		$this->assertFalse($kt->isTemporary());
		$this->assertFalse($kt->isCompany());
	}

	public function testCompany(): void
	{
		$kt = Kennitala::fromString('5001012880');

		$this->assertTrue($kt->isCompany());
		$this->assertFalse($kt->isPerson());
		$this->assertFalse($kt->isTemporary());
	}
}
