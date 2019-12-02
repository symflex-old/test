<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Model\Slave as SlaveInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SlaveRepository")
 */
class Slave implements SlaveInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Имя
     *
     * @var string
     * @ORM\Column(type="string", name="name", nullable=false)
     */
    private $name;

    /**
     * Пол
     *
     * @var int
     * @ORM\Column(type="integer", name="gender", nullable=false)
     */
    private $gender;

    /**
     * Стоимость
     *
     * @var int
     * @ORM\Column(type="integer", name="price", nullable=false)
     */
    private $price;

    /**
     * Ставка почасовой аренды
     *
     * @var int
     * @ORM\Column(type="integer", name="price_hourly_lease", nullable=false)
     */
    private $priceHourlyLease;

    /**
     * Возраст
     *
     * @var int
     * @ORM\Column(type="integer", name="age", nullable=false)
     */
    private $age;

    /**
     * Вес
     *
     * @var int
     * @ORM\Column(type="integer", name="weight", nullable=false)
     */
    private $weight;

    /**
     * Цвет кожи
     *
     * @var string
     * @ORM\Column(type="string", name="color", nullable=false)
     */
    private $color;

    /**
     * Где пойман/выращен;
     *
     * @var string
     * @ORM\Column(type="string", name="location", nullable=false)
     */
    private $location;

    /**
     * Описание и повадки (например, любит играть с собакой)
     *
     * @var string
     * @ORM\Column(type="string", name="description", nullable=false)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Model\Contract", mappedBy="slave")
     */
    private $contracts;

    public function __construct(
        string $name,
        int $age,
        int $gender,
        int $color,
        int $weight,
        int $price,
        int $priceHourlyLease,
        string $location,
        string $description
    ) {
        $this->name             = $name;
        $this->gender           = $gender;
        $this->age              = $age;
        $this->price            = $price;
        $this->weight           = $weight;
        $this->color            = $color;
        $this->location         = $location;
        $this->description      = $description;
        $this->priceHourlyLease = $priceHourlyLease;
    }

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
     * @return int
     */
    public function getGender(): int
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     * @return $this
     */
    public function setGender(int $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return $this
     */
    public function setPrice(int $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriceHourlyLease(): int
    {
        return $this->priceHourlyLease;
    }

    /**
     * @param int $priceHourlyLease
     * @return $this
     */
    public function setPriceHourlyLease(int $priceHourlyLease): self
    {
        $this->priceHourlyLease = $priceHourlyLease;
        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return $this
     */
    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     * @return $this
     */
    public function setWeight(int $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return $this
     */
    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @return $this
     */
    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getContracts(): Collection
    {
        return $this->contracts;
    }

}
