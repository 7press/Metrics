<?php declare(strict_types=1);
/**
 * Copy paste detector using Sebastian bergmann's phpcpd
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

use SebastianBergmann\PHPCPD\Detector\Strategy\DefaultStrategy;
use SebastianBergmann\PHPCPD\Detector\Detector as CPDetector;
use SebastianBergmann\PHPCPD\CodeCloneMap;

/**
 * Copy paste detector using Sebastian bergmann's phpcpd
 *
 * @category   SevenPress\Metrics
 * @package    Tool
 * @subpackage Cpd
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class PhpCpd implements Detector
{
    private $directory;

    private $analyser;

    public function __construct(string $directory)
    {
        $this->directory = $directory;
        $this->analyser  = new CPDetector(new DefaultStrategy());
    }

    public function run(): CodeCloneMap
    {
        return $this->analyser->copyPasteDetection($this->getFiles());
    }

    private function getFiles(): array
    {
        $files = [];

        $directoryIterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(
            $this->directory,
            \FilesystemIterator::CURRENT_AS_FILEINFO | \FilesystemIterator::KEY_AS_PATHNAME | \FilesystemIterator::SKIP_DOTS | \FilesystemIterator::UNIX_PATHS
        ));

        foreach ($directoryIterator as $path => $entry) {
            if ($entry->isDir() || strpos($path, '/.git') !== false || $entry->getExtension() !== 'php') {
                continue;
            }

            $files[] = realpath($path);
        }

        return $files;
    }
}
