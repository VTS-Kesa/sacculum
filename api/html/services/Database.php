<?php
/**
 * Database service.
 * php version 8.2
 *
 * @file
 * @category Service
 * @package  Kesa\Sacculum\Service
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
namespace Kesa\Sacculum\Service;

/**
 * Database service.
 *
 * @category Service
 * @package  Kesa\Sacculum\Service
 * @author   Zvonimir Rudinski <zvonimir.rudinski@noubis.com>
 * @license  Not licensed
 * @link     https://github.com/VTS-Kesa/sacculum
 */
class Database
{
    private static \PDO | null $_instance = null;

    /**
     * Get instance of database.
     *
     * @return \PDO
     */
    public static function getInstance()
    {
        if (self::$_instance == null) {
            $host = $_ENV['POSTGRES_HOST'];
            $port = $_ENV['POSTGRES_PORT'];
            $dbname = $_ENV['POSTGRES_DB'];
            $user = $_ENV['POSTGRES_USER'];
            $password = $_ENV['POSTGRES_PASSWORD'];

            self::$_instance = new \PDO(
                "pgsql:host=$host;port=$port;dbname=$dbname",
                $user,
                $password
            );
        }
        return self::$_instance;
    }
}
