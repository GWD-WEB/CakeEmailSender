<?php
namespace CakeEmailSender\Test\TestCase\Shell;

use CakeEmailSender\Shell\EmailSenderShell;
use Cake\TestSuite\TestCase;

/**
 * CakeEmailSender\Shell\EmailSenderShell Test Case
 */
class EmailSenderShellTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->io = $this->getMock('Cake\Console\ConsoleIo');
        $this->EmailSender = new EmailSenderShell($this->io);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmailSender);

        parent::tearDown();
    }

    /**
     * Test main method
     *
     * @return void
     */
    public function testMain()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
