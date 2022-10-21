<?php

namespace App\Entity;

use App\Entity\Commande;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ChambreRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ChambreRepository::class)]
class Chambre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'chambre', targetEntity: Commande::class)]
    private Collection $relation;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionCourte = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionLongue = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column]
    private ?int $prixJournalier = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEnregistrement = null;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, commande>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(commande $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
            $relation->setChambre($this);
        }

        return $this;
    }

    public function removeRelation(commande $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getChambre() === $this) {
                $relation->setChambre(null);
            }
        }

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescriptionCourte(): ?string
    {
        return $this->descriptionCourte;
    }

    public function setDescriptionCourte(string $descriptionCourte): self
    {
        $this->descriptionCourte = $descriptionCourte;

        return $this;
    }

    public function getDescriptionLongue(): ?string
    {
        return $this->descriptionLongue;
    }

    public function setDescriptionLongue(string $descriptionLongue): self
    {
        $this->descriptionLongue = $descriptionLongue;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrixJournalier(): ?int
    {
        return $this->prixJournalier;
    }

    public function setPrixJournalier(int $prixJournalier): self
    {
        $this->prixJournalier = $prixJournalier;

        return $this;
    }

    public function getDateEnregistrement(): ?\DateTimeInterface
    {
        return $this->dateEnregistrement;
    }

    public function setDateEnregistrement(\DateTimeInterface $dateEnregistrement): self
    {
        $this->dateEnregistrement = $dateEnregistrement;

        return $this;
    }
}
