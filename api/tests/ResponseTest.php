<?php
/**
 * Response test.
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
use Kesa\Sacculum\Core\Response;

/**
 * Response test.
 *
 * @category Test
 * @package  Kesa\Sacculum\Test
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
final class ResponseTest extends TestCase
{
    /**
     * Test if the echo is working.
     *
     * @return void
     */
    public function testResponse()
    {
        $this->assertEquals('{"test":"test"}', new Response(['test' => 'test']));
    }
}
