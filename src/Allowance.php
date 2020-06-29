<?php

namespace SalaryCalculator;

/**
 * Interface Allowance
 */
interface Allowance
{
    /**
     * @param Employee $employee
     * @return SalaryCalculation
     */
    public function getCalculation(Employee $employee): SalaryCalculation;
}
