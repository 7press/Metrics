<?php declare(strict_types=1);
/**
 * LOC runner
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

use SevenPress\Metrics\Tool\Loc\Total as TotalLoc;
use SevenPress\Metrics\Storage\Sql\Loc as LocStorage;

require_once __DIR__ . '/../bootstrap.php';

/**
 * bail if we are missing parameters
 */
if (!isset($argv[1])) exit("No commit supplied\n");

/**
 * Setup LOC calculator and storage
 */
$loc = new TotalLoc($targetDirectory);
$storage = new LocStorage($dbConnection);

// run
try {
    $storage->store($argv[1], $loc->run());
} catch (\PDOException $e) {
    echo $e->getMessage() . "\n";
}
