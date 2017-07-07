<?php
/**
 * Polder Knowledge / php-peek-lock (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/php-peek-lock for the canonical source repository
 * @copyright Copyright (c) 2017 Polder Knowledge (https://polderknowledge.com)
 * @license https://github.com/polderknowledge/php-peek-lock/blob/master/LICENSE.md MIT
 */

namespace PolderKnowledge\PeekLock\Exception;

use RuntimeException;

/**
 * An instanceof InvalidFileException is thrown when a path is provided to the PeekLock that is invalid.
 */
final class InvalidFileException extends RuntimeException
{
}
