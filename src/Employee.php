<?php

namespace SalaryCalculator;

use RangeException;

/**
 * Class Employee
 */
class Employee extends Person
{
    /**
     * @var array
     */
    private array $leasedProperties;
    /**
     * @var float|int
     */
    private float $baseSalary;
    /**
     * @var float
     */
    private float $baseTax;

    /**
     * Employee constructor.
     */
    public function __construct()
    {
        $this->setBaseTax(Taxes::$defaultTax);
        $this->setBaseSalary(0);
        $this->setChildrenCount(0);
        $this->setLeasedProperties([]);
    }

    /**
     * @return array
     */
    public function getLeasedProperties(): array
    {
        return $this->leasedProperties;
    }


    /**
     * @param array $leasedProperties
     */
    public function setLeasedProperties(array $leasedProperties): void
    {
        $this->leasedProperties = $leasedProperties;
    }


    /**
     * @return float
     */
    public function getBaseSalary(): float
    {
        return $this->baseSalary;
    }


    /**
     * @param float $baseSalary
     * @throws RangeException
     */
    public function setBaseSalary(float $baseSalary): void
    {
        if ($baseSalary < 0) {
            throw new  RangeException('Salary must be positive float');
        }
        $this->baseSalary = $baseSalary;
    }


    /**
     * @return float
     */
    public function getBaseTax(): float
    {
        return $this->baseTax;
    }


    /**
     * @param float $baseTax
     * @throws RangeException
     */
    public function setBaseTax(float $baseTax): void
    {
        if ($baseTax < 0) {
            throw new  RangeException('Base Tax must be positive float');
        }
        $this->baseTax = $baseTax;
    }

}
