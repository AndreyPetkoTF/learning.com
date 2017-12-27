<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Customer
 * @package AppBundle\Entity
 *
 * @ORM\Table("customer")
 * @ORM\Entity(repositoryClass="AppBundle\EntityRepository\CustomerRepository")
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    protected $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_gold", type="boolean")
     */
    protected $isGold;

    /**
     * @return int
     */
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
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isGold(): bool
    {
        return $this->isGold;
    }

    /**
     * @param bool $isGold
     */
    public function setIsGold(bool $isGold)
    {
        $this->isGold = $isGold;
    }
}