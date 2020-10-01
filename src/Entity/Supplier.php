<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\SupplierTranslation;
use App\Repository\SupplierRepository;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslatableInterface;

/**
 * @ORM\Entity(repositoryClass=SupplierRepository::class)
 */
class Supplier implements ResourceInterface, TranslatableInterface
{
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    public function __construct()
    {
        $this->initializeTranslationsCollection();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->getTranslation()->setName($name);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getTranslation()->getName();
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->getTranslation()->setDescription($description);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getTranslation()->getDescription();
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

     /**
     * {@inheritdoc}
     */
    protected function createTranslation()
    {
        return new SupplierTranslation();
    }
}
