<?php
declare(strict_types=1);

namespace App\Model;

/**
 * Interface Slave
 * @package App\Model
 */
interface Slave
{
    public const MALE   = 0;
    public const FEMALE = 1;

    public const COLOR_WHITE = '0';
    public const COLOR_BLACK = '1';

    public const GENDER = [
        self::MALE   => 'male',
        self::FEMALE => 'female'
    ];

    public const COLORS = [
        self::COLOR_WHITE => 'white',
        self::COLOR_BLACK => 'black'
    ];

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return int
     */
    public function getPrice(): int;

    /**
     * @return int
     */
    public function getPriceHourlyLease(): int;

    /**
     * @return int
     */
    public function getGender(): int;

    /**
     * @return string
     */
    public function getLocation(): string;

    /**
     * @return int
     */
    public function getAge(): int;

    /**
     * @return int
     */
    public function getWeight(): int;

    /**
     * @return string
     */
    public function getColor(): string;

    /**
     * @return object
     */
    public function getContracts(): object;
}
