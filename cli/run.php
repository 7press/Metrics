<?php declare(strict_types=1);
/**
 * Suite runner
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

require_once __DIR__ . '/../bootstrap.php';

/**
 * bail if we are missing parameters
 */
if (!isset($argv[1])) exit("No commit supplied\n");

/**
 * Load LOC runner
 */
require_once __DIR__ . '/run-loc.php';

/**
 * Load CPD runner
 */
require_once __DIR__ . '/run-cpd.php';

