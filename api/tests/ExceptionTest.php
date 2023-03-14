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
use Kesa\Sacculum\Core\Exception\BaseException;

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
    public function testException()
    {
        $this->expectException(BaseException::class);
        throw new BaseException('Test', 500);
    }
}
