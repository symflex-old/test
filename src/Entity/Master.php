<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Model\Master as MasterInterface;
use App\Model\Contract as ContractInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MasterRepository")
 */
class Master implements MasterInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", name="name", nullable=false)
     */
    private $name;

    /**
     * @var bool
     * @ORM\Column(type="boolean", name="is_vip", options={"default": false})
     */
    private $isVip;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Model\Contract", mappedBy="master")
     */
    private $contracts;

    /**
     * Master constructor.
     * @param string $name
     * @param bool $isVip
     */
    public function __construct(string $name, bool $isVip)
    {
        $this->name      = $name;
        $this->isVip     = $isVip;
        $this->contracts = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
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
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVip(): bool
    {
        return $this->isVip;
    }

    /**
     * @param bool $isVip
     * @return $this
     */
    public function setIsVip(bool $isVip): self
    {
        $this->isVip = $isVip;
        return $this;
    }

    public function getContracts(): Collection
    {
        return $this->contracts;
    }

    public function addContract(ContractInterface $contract)
    {

    }
}
