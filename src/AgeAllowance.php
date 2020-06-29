<?php

namespace SalaryCalculator;

/**
 * Class AgeAllowance
 */
class AgeAllowance implements Allowance
{
    /**
     * @param Employee $employee
     * @return SalaryCalculation
     */
    public function getCalculation(Employee $employee): SalaryCalculation
    {
        if ($employee->getAge() >= 50) {
            return new SalaryCalculation($employee->getBaseSalary() * 0.07, 0);
        }
        return new SalaryCalculation(0, 0);
    }
}
