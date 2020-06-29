<?php

namespace SalaryCalculator;

/**
 * Class ChildAllowance
 */
class ChildAllowance implements Allowance
{
    /**
     * @param Employee $employee
     * @return SalaryCalculation
     */
    public function getCalculation(Employee $employee): SalaryCalculation
    {
        if ($employee->getChildrenCount() > 2) {
            return new SalaryCalculation(0, -2);
        }
        return new SalaryCalculation(0, 0);
    }
}
