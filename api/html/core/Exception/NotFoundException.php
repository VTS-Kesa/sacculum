<?php
/**
 * Not Found exception class.
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

use Kesa\Sacculum\Core\Exception\BaseException;

/**
 * NotFound exception class.
 *
 * @category Core
 * @package  Kesa\Sacculum\Core\Exception
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
class NotFoundException extends BaseException
{

    /**
     * Constructor.
     *
     * @param string $message Exception message.
     */
    public function __construct(string $message = "Not Found")
    {
        parent::__construct($message, 404);
    }
}
