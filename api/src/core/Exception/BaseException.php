<?php
/**
 * API Router.
 * php version 8.2
 *
 * @file
 * @category Core
 * @package  Kesa\Sacculum\Core\Exception
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
namespace Kesa\Sacculum\Core\Exception;

/**
 * Base exception class.
 *
 * @category Core
 * @package  Kesa\Sacculum\Core\Exception
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
class BaseException extends \Exception
{

    /**
     * Constructor.
     *
     * @param string $message     Exception message.
     * @param int    $status_code HTTP status code.
     */
    public function __construct(string $message, int $status_code) 
    {
        parent::__construct($message, $status_code);
        http_response_code($status_code);
    }
}
