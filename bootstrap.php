<?php declare(strict_types=1);
/**
 * Configuration file
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
 * Set the memory limit properly high
 */
ini_set('memory_limit','512M');

/**
 * Add the composer autoloader
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Load the configuration
 */
require_once __DIR__ . '/config.php';
