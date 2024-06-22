<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Assert\Email(message: "L'email '{{ value }}' n'est pas un email valide.")]
    #[Assert\NotBlank(message: "L'email ne peut pas être vide.")]
    private $email;

    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank(message: "Le mot de passe ne peut pas être vide.")]
    #[Assert\Length(min: 8, minMessage: "Le mot de passe doit comporter au moins {{ limit }} caractères.")]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: "Le prénom ne peut pas être vide.")]
    private $prenom;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: "Le nom ne peut pas être vide.")]
    private $nom;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    // getters et setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
        // Supprimer les données sensibles de l'utilisateur.
        // Par exemple, réinitialiser les mots de passe en texte brut.
        // $this->plainPassword = null;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }
}
