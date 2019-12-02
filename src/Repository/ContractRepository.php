<?php

namespace App\Repository;

use App\Entity\Contract;
use App\Model\Master;
use App\Model\Slave;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Persistence\ManagerRegistry;
use DateTime;

/**
 * @method Contract|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contract|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contract[]    findAll()
 * @method Contract[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContractRepository extends ServiceEntityRepository
{
    /**
     * @var SlaveRepository
     */
    protected $slaveRespoitory;

    /**
     * @var MasterRepository
     */
    protected $masterRespository;

    public function __construct(
        ManagerRegistry $registry,
        SlaveRepository $slaveRepository,
        MasterRepository $masterRepository
    ) {
        parent::__construct($registry, Contract::class);
        $this->slaveRespoitory = $slaveRepository;
        $this->masterRespository = $masterRepository;
    }

    public function findContracts(
        Slave $slave,
        Master $master,
        DateTime $startDate,
        DateTime $endDate
    ): Collection {
        // логика поиска

        $qb = $this->createQueryBuilder('c');
        $qb->where('c.slave = :slave')
            ->andWhere('c.master = :master')
            ->andWhere('c.startDate <= :startDate OR c.endDate <= :endDate')
            ->setParameters([
                'slave' => $slave,
                'master' => $master,
                'startDate' => $startDate,
                'endDate' => $endDate
            ]);

        $count = $qb->getQuery()->getMaxResults();
        return new ArrayCollection();
    }

    public function create(
        Slave $slave,
        Master $master,
        DateTime $startDate,
        DateTime $endDate
    ): Contract {


        // логика создания контракта аренды
        $qb = $this->createQueryBuilder('c');
        $qb->select()
           ->where('c.slave = :slave')
           ->andWhere('c.master = :master')
           ->andWhere('c.startDate <= :startDate OR c.endDate <= :endDate')
           ->setParameters([
               'slave' => $slave,
               'master' => $master,
               'startDate' => $startDate,
               'endDate' => $endDate
           ]);


        return  new Contract();
    }

  //  protected
}
