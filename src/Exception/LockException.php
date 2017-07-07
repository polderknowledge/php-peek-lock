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
 * An instancceof LockException is thrown when it was not possible lock a file or release the lock to a file.
 */
final class LockException extends RuntimeException
{
}
