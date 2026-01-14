<?php declare(strict_types=1);

namespace Stefna\PersonContract\Exceptions;

use Throwable;

class InvalidEmail extends \DomainException
{
	public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
	{
		parent::__construct($message ?: 'Invalid email', $code, $previous);
	}
}
