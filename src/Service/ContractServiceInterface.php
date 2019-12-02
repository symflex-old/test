<?php

namespace App\Service;

use App\Model\Contract;
use App\Model\Master;
use App\Model\Slave;
use DateTime;

/**
 * Interface ContractServiceInterface
 * @package App\Service
 */
interface ContractServiceInterface
{
    /**
     * @param int $slaveId
     * @param int $masterId
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @return Contract
     */
    public function create(int $slaveId, int $masterId, DateTime $startDate, DateTime $endDate): Contract;

    /**
     * @param int $slaveId
     * @param int $masterId
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @return object
     */
    public function find(int $slaveId, int $masterId, DateTime $startDate, DateTime $endDate): object;
}