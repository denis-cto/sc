<?php

namespace SalaryCalculator;

class LeasedPropertiesAllowance implements Allowance
{
    public function getCalculation(Employee $employee): SalaryCalculation
    {
        /** @var Property $property */
        $leasedProperties = $employee->getLeasedProperties();
        if (!empty($leasedProperties)) {
            foreach ($leasedProperties as $property) {
                if ($property->getType() === 'Car') {
                    return new SalaryCalculation(-500, 0);
                }
            }
        }
        return new SalaryCalculation(0, 0);
    }
}
