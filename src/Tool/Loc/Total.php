<?php declare(strict_types=1);
/**
 * Lines of code calculator using Sebastian bergmann's phploc
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

use SebastianBergmann\PHPLOC\Analyser;

/**
 * Lines of code calculator using Sebastian bergmann's phploc
 *
 * @category   SevenPress\Metrics
 * @package    Tool
 * @subpackage Loc
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Total implements Loc
{
    private $directory;

    private $analyser;

    public function __construct(string $directory)
    {
        $this->directory = $directory;
        $this->analyser  = new Analyser();
    }

    public function run(): array
    {
        return $this->analyser->countFiles($this->getFiles(), true);
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
