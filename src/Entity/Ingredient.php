<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert; //venu du site symfo contrainte car on ve definr la contraine caracteur a ne pas depassé
use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    // id, sa valeur generée de base , en colonne
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(min:2, max: 50)]//grace à la L5,on ajoute L19, on dit k le nom soit entre 2 et 50 caractaires
    #[Assert\NotBlank()]//grace à la L5,on ajoute L20, valeur pas vide
    private ?string $name = null;

    #[ORM\Column]
    #[Assert\Positive()]//grace à la L5,on ajoute L19, prix >0
    #[Assert\NotNull()]//grace à la L5,pas null,lors de validation du formulaire
    #[Assert\LessThan(200)]//grace à la L5,pas depasser 200,lors de validation du formulaire
    private ?float $prix = null;

    #[ORM\Column]
    #[Assert\NotNull()]//grace à la L5,pas null,lors de validation du formulaire

    private ?\DateTimeImmutable $createdAt = null;
    //on veux k la date s'ajoute automatiquement a la creation d'ingredien d'ou le constructor
    public function __construct()
    {
     $this->createdAt = new \DateTimeImmutable(); //si on met new \, on va plus importer en haut
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
