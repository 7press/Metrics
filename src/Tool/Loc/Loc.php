<?php declare(strict_types=1);
/**
 * Lines of code calculator interface
 *
 * PHP version 7.0
 *
 * @category   SevenPress\Metrics
 * @package    Tool
 * @subpackage Loc
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://github.com/PeeHaa>
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0.0
 */
namespace SevenPress\Metrics\Tool\Loc;

/**
 * Lines of code calculator interface
 *
 * @category   SevenPress\Metrics
 * @package    Tool
 * @subpackage Loc
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
interface Loc
{
    public function run(): array;
}
