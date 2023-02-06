<?php

namespace App\Entity;

use App\Repository\WineRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: WineRepository::class)]
class Wine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $color = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[Vich\UploadableField(mapping: 'picture_file', fileNameProperty: 'picture')]
    private ?File $pictureFile = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTime $updateAt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'wines')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vineyard $vineyard = null;

    #[ORM\ManyToOne(inversedBy: 'wines')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $partner = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function setPictureFile(File $image = null): Wine
    {
        $this->pictureFile = $image;
        if ($image) {
            $this->updateAt = new DateTime('now');
        }
        return $this;
    }

    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }

    public function getUpdateAt(): ?DateTime
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?DateTime $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getVineyard(): ?Vineyard
    {
        return $this->vineyard;
    }

    public function setVineyard(?Vineyard $vineyard): self
    {
        $this->vineyard = $vineyard;

        return $this;
    }

    public function getPartner(): ?User
    {
        return $this->partner;
    }

    public function setPartner(?User $partner): self
    {
        $this->partner = $partner;

        return $this;
    }
}
