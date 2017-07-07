<?php
/**
 * Polder Knowledge / php-peek-lock (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/php-peek-lock for the canonical source repository
 * @copyright Copyright (c) 2017 Polder Knowledge (https://polderknowledge.com)
 * @license https://github.com/polderknowledge/php-peek-lock/blob/master/LICENSE.md MIT
 */

namespace PolderKnowledgeTest\PeekLock;

use PHPUnit\Framework\TestCase;
use PolderKnowledge\PeekLock\PeekLock;

class PeekLockTest extends TestCase
{
    /**
     * @expectedException \PolderKnowledge\PeekLock\Exception\InvalidFileException
     */
    public function testInvalidFileThrowsException()
    {
        // Arrange
        $path = 'invalid';

        // Act
        $peekLock = new PeekLock($path);

        // Assert
        // ...
    }

    public function testPeek()
    {
        $pid = pcntl_fork();
        if ($pid === -1) {
            throw new \Exception('could not fork');
        } elseif ($pid) {
            // we are the parent
            sleep(1);
            $lock = new PeekLock('README.md');
            $lock->blockTillLock();
            sleep(2);
            // 3 seconds
            $lock->release();
            sleep(3); // prevent immediate exit
        } else {
            // we are the child
            // 0 seconds
            $lock = new PeekLock('README.md');
            $this->assertFalse($lock->isLocked());
            sleep(2);
            $this->assertTrue($lock->isLocked());
            sleep(2);
            // 4 seconds
            $this->assertFalse($lock->isLocked());
        }
    }
}
