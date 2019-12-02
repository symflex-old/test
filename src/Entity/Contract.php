<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Model\Contract as LeaseInterface;
use DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContractRepository")
 */
class Contract implements LeaseInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var
     * @ORM\OneToOne(targetEntity="App\Model\Slave")
     * @ORM\JoinColumn(name="slave_id", referencedColumnName="id")
     */
    private $slave;

    /**
     * @var Master
     * @ORM\ManyToOne(targetEntity="App\Model\Master", inversedBy="master")
     * @ORM\JoinColumn(name="master_id", referencedColumnName="id")
     */
    private $master;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", name="start_date", nullable=false)
     */
    private $startDate;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", name="end_date", nullable=false)
     */
    private $endDate;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSlave(): Slave
    {
        return $this->slave;
    }

    /**
     * @param $slave
     * @return $this
     */
    public function setSlave($slave): self
    {
        $this->slave = $slave;
        return $this;
    }

    /**
     * @return Master
     */
    public function getMaster(): Master
    {
        return $this->master;
    }

    /**
     * @param DateTime $master
     * @return $this
     */
    public function setMaster(\DateTime $master): self
    {
        $this->master = $master;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    /**
     * @param DateTime $startDate
     * @return $this
     */
    public function setStartDate(\DateTime $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    /**
     * @param DateTime $endDate
     * @return $this
     */
    public function setEndDate(DateTime $endDate): self
    {
        $this->endDate = $endDate;
        return $this;
    }
}
