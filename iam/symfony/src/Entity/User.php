<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User
{
    use TimestampableEntity;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private UuidInterface $id;

    /** @Column(type="string") */
    private string $firstName;

    /** @Column(type="string") */
    private string $lastName;

    /** @Column(type="string") */
    private string $email;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }


    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    
    public function toString(): string
    {
        return "{$this->getFirstName()} {$this->getLastName()} {$this->getEmail()}@fake.mail.com created at: {$this->getCreatedAt()->format(\DateTime::ATOM)}";
    }
}