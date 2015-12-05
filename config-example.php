<?php declare(strict_types=1);
/**
 * Configuration file
 *
 * Copy this file to ./config.php and change to your environment variables
 *
 * PHP version 7.0
 *
 * @category   SevenPress\Metrics
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://github.com/PeeHaa>
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0.0
 */
namespace SevenPress\Metrics;

/**
 * Setup the target WordPress directory
 */
$targetDirectory = '/path/to/wordpress';

/**
 * Setup database connection
 */
$dbConnection = new \PDO('pgsql:dbname=7press;host=127.0.0.1', 'user', 'pass');

$dbConnection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
$dbConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
