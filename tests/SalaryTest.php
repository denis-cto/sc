<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SalaryCalculator\AgeAllowance;
use SalaryCalculator\AllowanceRegistry;
use SalaryCalculator\ChildAllowance;
use SalaryCalculator\Employee;
use SalaryCalculator\LeasedPropertiesAllowance;
use SalaryCalculator\Property;
use SalaryCalculator\Salary;

/**
 * Class SalaryTest
 * Functional Tests @example
 */
final class SalaryTest extends TestCase
{
    public function init(): void
    {
        AllowanceRegistry::register('ageAllowance', new AgeAllowance());
        AllowanceRegistry::register('childAllowance', new ChildAllowance());
        AllowanceRegistry::register('leasedPropertiesAllowance', new LeasedPropertiesAllowance());
    }

    public function assignEmployeeData($item)
    {
        $employee = new Employee();
        $employee->setName($item['name']);
        $employee->setAge($item['age']);
        $employee->setChildrenCount($item['childrenCount']);
        if (!empty($item['leasedProperties'])) {
            $employee->setLeasedProperties($item['leasedProperties']);
        }
        $employee->setBaseSalary($item['baseSalary']);
        return $employee;
    }
    /**
     *
     */
    public function testAliceData(): void
    {
        $this->init();
        $item =
            [
                'name' => 'Alice',
                'age' => 26,
                'childrenCount' => 2,
                'baseSalary' => 6000,
                'leasedProperties' => [],
            ];
        $employee = $this->assignEmployeeData($item);
        $employeeSalary = new Salary($employee);
        $calculation = $employeeSalary->getSalaryCalculation();
        $this->assertEquals($calculation->getTax(), 20);
        $this->assertEquals($calculation->getSalary(), 4800);
    }

    /**
     *
     */
    public function testBobData(): void
    {
        $this->init();
        $item =
            [
                'name' => 'Bob',
                'age' => 52,
                'childrenCount' => 0,
                'baseSalary' => 4000,
                'leasedProperties' => [new Property('Car')],
            ];
        $employee = $this->assignEmployeeData($item);
        $employeeSalary = new Salary($employee);
        $calculation = $employeeSalary->getSalaryCalculation();
        $this->assertEquals($calculation->getTax(), 20);
        $this->assertEquals($calculation->getSalary(), 3024);
    }

    /**
     *
     */
    public function testCharlieData(): void
    {
        $this->init();
        $item =
            [
                'name' => 'Charlie',
                'age' => 36,
                'childrenCount' => 3,
                'baseSalary' => 5000,
                'leasedProperties' => [new Property('Car')],
            ];
        $employee = $this->assignEmployeeData($item);
        $employeeSalary = new Salary($employee);
        $calculation = $employeeSalary->getSalaryCalculation();
        $this->assertEquals(18, $calculation->getTax());
        $this->assertEquals(3690, $calculation->getSalary());
    }

}
