<?php declare(strict_types=1);
/**
 * Copy paste detector interface
 *
 * PHP version 7.0
 *
 * @category   SevenPress\Metrics
 * @package    Tool
 * @subpackage Cpd
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://github.com/PeeHaa>
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0.0
 */
namespace SevenPress\Metrics\Tool\Cpd;

use SebastianBergmann\PHPCPD\CodeCloneMap;

/**
 * Copy paste detector interface
 *
 * @category   SevenPress\Metrics
 * @package    Tool
 * @subpackage Cpd
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
interface Detector
{
    public function run(): CodeCloneMap;
}
