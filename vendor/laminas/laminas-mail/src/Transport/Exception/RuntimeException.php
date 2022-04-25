<?php

/**
 * @see       https://github.com/laminas/laminas-mail for the canonical source repositories
 * @copyright https://github.com/laminas/laminas-mail/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mail/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\Mail\Transport\Exception;

use Laminas\Mail\Exception;

/**
 * Exception for Laminas\Mail component.
 */
class RuntimeException extends Exception\RuntimeException implements ExceptionInterface
{
}
