<?php

namespace SalaryCalculator;

/**
 * Class SalaryCalculation
 */
class SalaryCalculation
{
    /**
     * @var float
     */
    private float $tax;
    /**
     * @var float
     */
    private float $salary;

    /**
     * SalaryCalculation constructor.
     * @param float $salary
     * @param float $tax
     */
    public function __construct(float $salary, float $tax)
    {
        $this->setSalary($salary);
        $this->setTax($tax);
    }

    /**
     * @return float
     */
    public function getTax(): float
    {
        return $this->tax;
    }

    /**
     * @param float $tax
     */
    public function setTax(float $tax): void
    {
        $this->tax = $tax;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @param float $salary
     */
    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }

}
