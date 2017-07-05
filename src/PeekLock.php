<?php

namespace PolderKnowledge\ReadersWriterLock;

class PeekLock
{
    private $filePath;

    private $fileHandle;

    public function __construct(string $filepath)
    {
        if (!$filepath) {
            throw new \InvalidArgumentException('Filename is required to create a lock');
        }

        $fileHandle = fopen($filepath, 'r');
        if (!$fileHandle) {
            throw new \RuntimeException('Could not open file to create lock: ' . $filepath);
        }

        $this->filePath = $filepath;
        $this->fileHandle = $fileHandle;
    }

    public function blockTillLock(): void
    {
        $lockSucceeded = flock($this->fileHandle, LOCK_EX);
        if (!$lockSucceeded) {
            throw new \RuntimeException('An error occurred aquiring exclusive lock on ' . $this->filePath);
        }
    }

    public function isLocked(): bool
    {
        $lockSucceeded = flock($this->fileHandle, LOCK_SH | LOCK_NB);
        if ($lockSucceeded) {
            $this->release();
        }

        return !$lockSucceeded;
    }

    public function release(): void
    {
        $releaseSucceeded = flock($this->fileHandle, LOCK_UN);
        if (!$releaseSucceeded) {
            throw new \RuntimeException('An error occurred releasing lock: ' . $this->filePath);
        }
    }

    public function __destruct()
    {
        $this->release();
    }
}
