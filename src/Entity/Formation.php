<?php


namespace App\Entity;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Formation
 * @package App\Entity
 * @ORM\Entity
 */
class Formation
{
    /**
     * @var int|null
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private $title;
    /**
     * @var string|null
     * @ORM\Column(type="text")
     */
    private $description;
    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="date_immutable")
     */
    private $startedAt;
    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="date_immutable", nullable=true)
     */
    private $endedAt;


    public function _construct()
    {
        $this->id = null;
        $this->title = null;
        $this->description = null;
        $this->startedAt = new DatetimeImmutable();
        $this->endedAt = null;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Formation
     */
    public function setId(?int $id): Formation
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return Formation
     */
    public function setTitle(?string $title): Formation
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Formation
     */
    public function setDescription(?string $description): Formation
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getStartedAt(): ?DateTimeInterface
    {
        return $this->startedAt;
    }

    /**
     * @param DateTimeInterface|null $startedAt
     * @return Formation
     */
    public function setStartedAt(?DateTimeInterface $startedAt): Formation
    {
        $this->startedAt = $startedAt;
        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getEndedAt(): ?DateTimeInterface
    {
        return $this->endedAt;
    }

    /**
     * @param DateTimeInterface|null $endedAt
     * @return Formation
     */
    public function setEndedAt(?DateTimeInterface $endedAt): Formation
    {
        $this->endedAt = $endedAt;
        return $this;
    }
}
