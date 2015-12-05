<?php declare(strict_types=1);
/**
 * CPD runner
 *
 * PHP version 7.0
 *
 * @category   SevenPress\Metrics
 * @package    Cli
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://github.com/PeeHaa>
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0.0
 */
namespace SevenPress\Metrics\Cli;

use SevenPress\Metrics\Tool\Cpd\PhpCpd;
use SevenPress\Metrics\Storage\Sql\Cpd;

require_once __DIR__ . '/../bootstrap.php';

/**
 * bail if we are missing parameters
 */
if (!isset($argv[1])) exit("No commit supplied\n");

/**
 * Setup CPD calculator and storage
 */
$cpd     = new PhpCpd($targetDirectory);
$storage = new Cpd($dbConnection);

/**
 * Run the detector
 */
$result = $cpd->run();

try {
    $storage->storePercentage($argv[1], (float) $result->getPercentage());
} catch(\PDOException $e) {
    echo $e->getMessage() . "\n";
}

foreach ($result as $file) {
    foreach ($file->getFiles() as $dupe) {
        try {
            $storage->storeFile($argv[1], $file->getLines(), $dupe->getId(), $dupe->getName(), (int) $dupe->getStartLine());
        } catch(\PDOException $e) {
            echo $e->getMessage() . "\n";
        }
    }
}
