<?php
/**
 * Exception test.
 * php version 8.2
 *
 * @file
 * @category Test
 * @package  Kesa\Sacculum\Test
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
use PHPUnit\Framework\TestCase;
use Kesa\Sacculum\Core\Exception\NotFoundException;

/**
 * Exception test.
 *
 * @category Test
 * @package  Kesa\Sacculum\Test
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
final class ExceptionTest extends TestCase
{
    /**
     * Test if the test is working.
     *
     * @return void
     */
    public function testNotFound()
    {
        $exception = new NotFoundException('Test');
        $this->assertEquals(404, $exception->getCode());
    }
}
