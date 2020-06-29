<?php

use SalaryCalculator\AgeAllowance;
use SalaryCalculator\AllowanceRegistry;
use SalaryCalculator\ChildAllowance;
use SalaryCalculator\Employee;
use SalaryCalculator\LeasedPropertiesAllowance;
use SalaryCalculator\Property;
use SalaryCalculator\Salary;

require __DIR__ . '/vendor/autoload.php';


AllowanceRegistry::register('ageAllowance', new AgeAllowance());
AllowanceRegistry::register('childAllowance', new ChildAllowance());
AllowanceRegistry::register('leasedPropertiesAllowance', new LeasedPropertiesAllowance());

$data = [
    [
        'name' => 'Alice',
        'age' => 26,
        'childrenCount' => 2,
        'baseSalary' => 6000,
        'leasedProperties' => [],
    ],
    [
        'name' => 'Bob',
        'age' => 52,
        'childrenCount' => 0,
        'baseSalary' => 4000,
        'leasedProperties' => [new Property('Car')],
    ],
    [
        'name' => 'Charlie',
        'age' => 36,
        'childrenCount' => 3,
        'baseSalary' => 5000,
        'leasedProperties' => [new Property('Car')],
    ],
];

foreach ($data as $item) {
    $employee = new Employee();
    $employee->setName($item['name']);
    $employee->setAge($item['age']);
    $employee->setChildrenCount($item['childrenCount']);
    if (!empty($item['leasedProperties'])) {
        $employee->setLeasedProperties($item['leasedProperties']);
    }

    $employee->setBaseSalary($item['baseSalary']);
    $employeeSalary = new Salary($employee);
    try {
        $calculation = $employeeSalary->getSalaryCalculation();
        echo $employee->getName() . "\t"
            . 'Base salary: ' . $employee->getBaseSalary() . "\t"
            . 'Tax: ' . $calculation->getTax() . "\t"
            . 'Net pay: ' . $calculation->getSalary() . "\n";
    } catch (Exception $e) {
        echo $e->getMessage() . "\n";
    }
}

