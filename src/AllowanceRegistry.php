<?php

namespace SalaryCalculator;

/**
 * Class AllowanceRegistry
 */
class AllowanceRegistry
{
    /**
     * @var array
     */
    private static array $listOfAllowances = [];

    /**
     * @param string $name
     * @param Allowance $allowance
     */
    public static function register(string $name, Allowance $allowance): void
    {
        self::$listOfAllowances[$name] = $allowance;
    }

    /**
     * @return array
     */
    public static function getRegisteredAllowances(): array
    {
        return self::$listOfAllowances;
    }


}
