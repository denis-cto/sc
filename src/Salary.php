<?php

namespace SalaryCalculator;

use RangeException;

/**
 * Class Salary
 */
class Salary
{
    /**
     * @var Employee
     */
    private Employee $employee;

    /**
     * Salary constructor.
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * @return SalaryCalculation
     * @throws RangeException
     */
    public function getSalaryCalculation(): SalaryCalculation
    {
        $salary = $this->employee->getBaseSalary();
        $tax = $this->employee->getBaseTax();

        if (empty($salary)) {
            throw new  RangeException('Base salary is not set');
        }
        if (empty($tax)) {
            throw new RangeException('Base tax is not set');
        }

        /** @var Allowance $allowance */
        foreach (AllowanceRegistry::getRegisteredAllowances() as $allowance) {
            $salaryCalculation = $allowance->getCalculation($this->employee);
            $salary += $salaryCalculation->getSalary();
            $tax += $salaryCalculation->getTax();
        }
        return new SalaryCalculation(
            round($salary * (100 - $tax) / 100, 2),
            $tax,
        );

    }
}
