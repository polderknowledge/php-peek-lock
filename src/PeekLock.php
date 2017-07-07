<?php
/**
 * Polder Knowledge / php-peek-lock (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/php-peek-lock for the canonical source repository
 * @copyright Copyright (c) 2017 Polder Knowledge (https://polderknowledge.com)
 * @license https://github.com/polderknowledge/php-peek-lock/blob/master/LICENSE.md MIT
 */

namespace PolderKnowledge\PeekLock;

use PolderKnowledge\PeekLock\Exception\InvalidFileException;
use PolderKnowledge\PeekLock\Exception\LockException;

/**
 * The PeekLock class will act as a scoped lock for files.
 */
final class PeekLock
{
    /**
     * The path to the file to lock.
     *
     * @var string
     */
    private $filePath;

    /**
     * The handle of the file that can be locked.
     *
     * @var resource
     */
    private $fileHandle;

    /**
     * Initializes a new instance of this class.
     *
     * @param string $path The path to the file to lock.
     * @throws InvalidFileException Thrown when the path is invalid.
     */
    public function __construct(string $path)
    {
        if (!$path || !is_file($path)) {
            throw new InvalidFileException('Filename is required to create a lock');
        }

        $fileHandle = fopen($path, 'c');
        if (!$fileHandle) {
            throw new InvalidFileException('Could not open file to create lock: ' . $path);
        }

        $this->filePath = $path;
        $this->fileHandle = $fileHandle;
    }

    /**
     * Cleans up all resources used by this class.
     */
    public function __destruct()
    {
        $this->release();
    }

    /**
     * Locks the file.
     *
     * @return void
     * @throws LockException Thrown when the lock could not be created.
     */
    public function blockTillLock()
    {
        $lockSucceeded = flock($this->fileHandle, LOCK_EX);

        if (!$lockSucceeded) {
            throw new LockException('An error occurred aquiring exclusive lock on ' . $this->filePath);
        }
    }

    /**
     * Checks if the lock is active.
     *
     * @return bool
     */
    public function isLocked(): bool
    {
        $lockSucceeded = flock($this->fileHandle, LOCK_SH | LOCK_NB);

        if ($lockSucceeded) {
            $this->release();
        }

        return !$lockSucceeded;
    }

    /**
     * Releases the locked file.
     *
     * @return void
     * @throws LockException Thrown when the lock could not be released.
     */
    public function release()
    {
        $releaseSucceeded = flock($this->fileHandle, LOCK_UN);

        if (!$releaseSucceeded) {
            throw new LockException('An error occurred releasing lock: ' . $this->filePath);
        }
    }
}
