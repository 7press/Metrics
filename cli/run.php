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

use SevenPress\Metrics\Tool\Loc\Total as TotalLoc;

require_once __DIR__ . '/../bootstrap.php';

$loc = new TotalLoc($targetDirectory);

var_dump($loc->run());
