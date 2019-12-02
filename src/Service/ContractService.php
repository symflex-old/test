<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\Contract;
use App\Repository\ContractRepository;
use App\Repository\MasterRepository;
use App\Repository\SlaveRepository;
use DateTime;
use Doctrine\Common\Collections\Collection;
use Exception;

class ContractService implements ContractServiceInterface
{
    /**
     * @var SlaveRepository
     */
    protected $slaveRepository;

    /**
     * @var MasterRepository
     */
    protected $masterRepository;

    /**
     * @var ContractRepository
     */
    protected $contractRepository;

    public function __construct(
        SlaveRepository $slaveRepository,
        MasterRepository $masterRepository,
        ContractRepository $contractRepository
    ){
        $this->slaveRepository  = $slaveRepository;
        $this->contractRepository  = $contractRepository;
        $this->masterRepository = $masterRepository;
    }

    public function create(
        int $masterId,
        int $slaveId,
        DateTime $startDate,
        DateTime $endDate
    ): Contract {
        $slave = $this->slaveRepository->find($slaveId);
        $master = $this->masterRepository->find($masterId);

        if (!$slave) {
            throw new Exception('Раб не найден');
        }

        if (!$master) {
            throw new Exception('Рабовладелец не найден');
        }

       // $this->contractRepository->fin

        return $this->contractRepository->create($slave, $master, $startDate, $endDate);
    }

    public function find(int $slaveId, int $masterId, DateTime $startDate, DateTime $endDate): Collection
    {
        $slave = $this->slaveRepository->find($slaveId);
        $master = $this->masterRepository->find($masterId);

        if (!$slave) {
            throw new Exception('Раб не найден');
        }

        if (!$master) {
            throw new Exception('Рабовладелец не найден');
        }

        return $this->contractRepository->findContracts($slave, $master, $startDate, $endDate);
    }
}
