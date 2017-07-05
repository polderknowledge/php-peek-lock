<?php

namespace PolderKnowledgeTest\PeekLock;

use PHPUnit\Framework\TestCase;
use PolderKnowledge\PeekLock\PeekLock;

class PeekLockTest extends TestCase
{
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
