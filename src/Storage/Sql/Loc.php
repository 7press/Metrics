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
class Loc
{
    private $dbConnection;

    public function __construct(\PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function store(string $commit, array $data)
    {
        $query = 'INSERT INTO loc';
        $query.= ' (commit, files, loc, lloc, lloc_classes, lloc_functions, lloc_global, ccn, ccn_methods, interfaces';
        $query.= ', traits, classes, abstract_classes, concrete_classes, functions, named_functions, anonymous_functions';
        $query.= ', methods, public_methods, non_public_methods, non_static_methods, static_methods, constants';
        $query.= ', class_constants, global_constants, test_classes, test_methods, ccn_by_lloc, lloc_by_nof';
        $query.= ', method_calls, static_method_calls, instance_method_calls, attribute_access, static_attribute_access';
        $query.= ', instance_attribute_access, global_access, global_variable_access, super_global_variable_access';
        $query.= ', global_constant_access, class_ccn_min, class_ccn_avg, class_ccn_max, class_lloc_min, class_lloc_avg';
        $query.= ', class_lloc_max, method_ccn_min, method_ccn_avg, method_ccn_max, method_lloc_min, method_lloc_avg';
        $query.= ', method_lloc_max, directories, namespaces, ncloc)';
        $query.= ' VALUES';
        $query.= ' (:commit, :files, :loc, :lloc, :lloc_classes, :lloc_functions, :lloc_global, :ccn, :ccn_methods, :interfaces';
        $query.= ', :traits, :classes, :abstract_classes, :concrete_classes, :functions, :named_functions, :anonymous_functions';
        $query.= ', :methods, :public_methods, :non_public_methods, :non_static_methods, :static_methods, :constants';
        $query.= ', :class_constants, :global_constants, :test_classes, :test_methods, :ccn_by_lloc, :lloc_by_nof';
        $query.= ', :method_calls, :static_method_calls, :instance_method_calls, :attribute_access, :static_attribute_access';
        $query.= ', :instance_attribute_access, :global_access, :global_variable_access, :super_global_variable_access';
        $query.= ', :global_constant_access, :class_ccn_min, :class_ccn_avg, :class_ccn_max, :class_lloc_min, :class_lloc_avg';
        $query.= ', :class_lloc_max, :method_ccn_min, :method_ccn_avg, :method_ccn_max, :method_lloc_min, :method_lloc_avg';
        $query.= ', :method_lloc_max, :directories, :namespaces, :ncloc)';

        $stmt = $this->dbConnection->prepare($query);
        $stmt->execute([
            'commit'                        => $commit,
            'files'                         => $data['files'],
            'loc'                           => $data['loc'],
            'lloc'                          => $data['lloc'],
            'lloc_classes'                  => $data['llocClasses'],
            'lloc_functions'                => $data['llocClasses'],
            'lloc_global'                   => $data['llocGlobal'],
            'ccn'                           => $data['ccn'],
            'ccn_methods'                   => $data['ccnMethods'],
            'interfaces'                    => $data['interfaces'],
            'traits'                        => $data['traits'],
            'classes'                       => $data['classes'],
            'abstract_classes'              => $data['abstractClasses'],
            'concrete_classes'              => $data['concreteClasses'],
            'functions'                     => $data['functions'],
            'named_functions'               => $data['namedFunctions'],
            'anonymous_functions'           => $data['anonymousFunctions'],
            'methods'                       => $data['methods'],
            'public_methods'                => $data['publicMethods'],
            'non_public_methods'            => $data['nonPublicMethods'],
            'non_static_methods'            => $data['nonStaticMethods'],
            'static_methods'                => $data['staticMethods'],
            'constants'                     => $data['constants'],
            'class_constants'               => $data['classConstants'],
            'global_constants'              => $data['globalConstants'],
            'test_classes'                  => $data['testClasses'],
            'test_methods'                  => $data['testMethods'],
            'ccn_by_lloc'                   => $data['ccnByLloc'],
            'lloc_by_nof'                   => $data['llocByNof'],
            'method_calls'                  => $data['methodCalls'],
            'static_method_calls'           => $data['staticMethodCalls'],
            'instance_method_calls'         => $data['instanceMethodCalls'],
            'attribute_access'              => $data['attributeAccesses'],
            'static_attribute_access'       => $data['staticAttributeAccesses'],
            'instance_attribute_access'     => $data['instanceAttributeAccesses'],
            'global_access'                 => $data['globalAccesses'],
            'global_variable_access'        => $data['globalVariableAccesses'],
            'super_global_variable_access'  => $data['superGlobalVariableAccesses'],
            'global_constant_access'        => $data['globalConstantAccesses'],
            'class_ccn_min'                 => $data['classCcnMin'],
            'class_ccn_avg'                 => $data['classCcnAvg'],
            'class_ccn_max'                 => $data['classCcnMax'],
            'class_lloc_min'                => $data['classLlocMin'],
            'class_lloc_avg'                => $data['classLlocAvg'],
            'class_lloc_max'                => $data['classLlocMax'],
            'method_ccn_min'                => $data['methodCcnMin'],
            'method_ccn_avg'                => $data['methodCcnAvg'],
            'method_ccn_max'                => $data['methodCcnMax'],
            'method_lloc_min'               => $data['methodLlocMin'],
            'method_lloc_avg'               => $data['methodLlocAvg'],
            'method_lloc_max'               => $data['methodLlocMax'],
            'directories'                   => $data['directories'],
            'namespaces'                    => $data['namespaces'],
            'ncloc'                         => $data['ncloc'],
        ]);
    }
}
