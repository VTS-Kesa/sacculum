<?php
/**
 * API Response.
 * php version 8.2
 *
 * @file
 * @category Core
 * @package  Kesa\Sacculum\Core\Response
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
namespace Kesa\Sacculum\Core;

use Steampixel\Route;
use Kesa\Sacculum\Core\Exception\NotFoundException;

/**
 * Response for the API.
 *
 * @category Core
 * @package  Kesa\Sacculum\Core\Response
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
class Response
{
    private mixed $_data;
    private int|null $_status_code = null;

    /**
     * Constructor.
     *
     * @param mixed    $data        Data to be returned.
     * @param int|null $status_code HTTP status code.
     */
    public function __construct(mixed $data, int|null $status_code = null)
    {
        $this->_data = $data;
        $this->_status_code = $status_code;
    }

    /**
     * Return the response.
     *
     * @return string
     */
    public function __toString()
    {
        if (!is_null($this->_status_code)) {
            http_response_code($this->_status_code);
        }
        return json_encode($this->_data);
    }
}
