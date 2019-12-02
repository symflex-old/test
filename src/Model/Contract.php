<?php
declare(strict_types=1);

namespace App\Model;

use DateTime;

/**
 * Interface Contract
 * @package App\Model
 */
interface Contract
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return object
     */
    public function getSlave(): object;

    /**
     * @return object
     */
    public function getMaster(): object;

    /**
     * @return DateTime
     */
    public function getStartDate(): DateTime;

    /**
     * @return DateTime
     */
    public function getEndDate(): DateTime;
}
