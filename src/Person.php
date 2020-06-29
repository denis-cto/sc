<?php

namespace SalaryCalculator;

use RangeException;

/**
 * Class Person
 * @package SalaryCalculator
 */
abstract class Person
{
    /**
     * @var int
     */
    private int $childrenCount = 0;
    /**
     * @var int
     */
    private int $age = 0;
    /**
     * @var string
     */
    private string $name = '';

    /**
     * @return mixed
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @throws RangeException
     */
    public function setAge(int $age): void
    {
        if (($age < 0) || ($age > 150)) {
            throw new  RangeException('Age must be positive integer from 0 to 149');
        }
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getChildrenCount(): int
    {
        return $this->childrenCount;
    }

    /**
     * @param int $childrenCount
     */
    public function setChildrenCount(int $childrenCount): void
    {
        $this->childrenCount = $childrenCount;
    }

}
