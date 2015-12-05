<?php declare(strict_types=1);
/**
 * Storage for LOC runs
 *
 * PHP version 7.0
 *
 * @category   SevenPress\Metrics
 * @package    Storage
 * @subpackage Sql
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://github.com/PeeHaa>
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0.0
 */
namespace SevenPress\Metrics\Storage\Sql;

use SebastianBergmann\PHPLOC\Analyser;

/**
 * Storage for LOC runs
 *
 * @category   SevenPress\Metrics
 * @package    Storage
 * @subpackage Sql
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Cpd
{
    private $dbConnection;

    public function __construct(\PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function storePercentage(string $commit, float $percentage)
    {
        $query = 'INSERT INTO cpd';
        $query.= ' (commit, percentage)';
        $query.= ' VALUES';
        $query.= ' (:commit, :percentage)';

        $stmt = $this->dbConnection->prepare($query);
        $stmt->execute([
            'commit'     => $commit,
            'percentage' => $percentage,
        ]);
    }

    public function storeFile(string $commit, string $content, string $id, string $name, int $startLine)
    {
        $query = 'INSERT INTO cpd_entries';
        $query.= ' (commit, hash, filename, start, content, id)';
        $query.= ' VALUES';
        $query.= ' (:commit, :hash, :filename, :start, :content, :id)';

        $stmt = $this->dbConnection->prepare($query);
        $stmt->execute([
            'commit'   => $commit,
            'hash'     => sha1($content),
            'filename' => $name,
            'start'    => $startLine,
            'content'  => $content,
            'id'       => $id,
        ]);
    }
}
