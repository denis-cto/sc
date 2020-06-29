<?php
declare(strict_types=1);
require __DIR__ . './../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

/**
 * Class EmployeeTest
 * Unit tests @example
 */
final class EmployeeTest extends TestCase
{
    /**
     *
     */
    public function testEmptyEmployee(): void
    {
        $employee = new \SalaryCalculator\Employee();
        $this->assertEquals($employee->getBaseSalary(), 0);
        $this->assertEquals($employee->getName(), '');
        $this->assertEquals($employee->getAge(), 0);
        $this->assertEquals($employee->getLeasedProperties(), []);
        $this->assertEquals($employee->getChildrenCount(), 0);
        $this->assertEquals($employee->getBaseTax(), 20);
    }

    /**
     *
     */
    public function testEmployee(): void
    {
        $employee = new \SalaryCalculator\Employee();
        $employee->setName('Denis');
        $this->assertEquals($employee->getName(), 'Denis');
        $employee->setAge(37);
        $this->assertEquals($employee->getAge(), 37);

        $employee->setBaseTax(21);
        $this->assertEquals($employee->getBaseTax(), 21);

        $employee->setBaseSalary(5000);
        $this->assertEquals($employee->getBaseSalary(), 5000);

        $employee->setChildrenCount(1);
        $this->assertEquals($employee->getChildrenCount(), 1);

        $employee->setLeasedProperties([new \SalaryCalculator\Property('Car')]);
        $this->assertEquals($employee->getLeasedProperties(), [new \SalaryCalculator\Property('Car')]);

    }

    /**
     *
     */
    public function testNegativeEmployeeAge(): void
    {
        $employee = new \SalaryCalculator\Employee();

        $this->expectException(RangeException::class);
        $employee->setAge(-37);
    }

    /**
     *
     */
    public function testNegativeEmployeeTax(): void
    {
        $employee = new \SalaryCalculator\Employee();

        $this->expectException(RangeException::class);
        $employee->setBaseTax(-37);
    }

    /**
     *
     */
    public function testNegativeEmployeeSalary(): void
    {
        $employee = new \SalaryCalculator\Employee();

        $this->expectException(RangeException::class);
        $employee->setBaseSalary(-37);
    }


}
