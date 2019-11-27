<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TriangleRepository")
 */
class Triangle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=4)
     */
    private $a;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=4)
     */
    private $b;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=4)
     */
    private $c;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getA(): ?string
    {
        return $this->a;
    }

    public function setA(string $a): self
    {
        $this->a = $a;

        return $this;
    }

    public function getB(): ?string
    {
        return $this->b;
    }

    public function setB(string $b): self
    {
        $this->b = $b;

        return $this;
    }

    public function getC(): ?string
    {
        return $this->c;
    }

    public function setC(string $c): self
    {
        $this->c = $c;

        return $this;
    }
    public function calculateCircumference(){
        return $this->a+$this->b+$this->c;
    }
    public function calculateArea(){
        $p = ($this->a+$this->b+$this->c)/2;
        return sqrt($p*($p-$this->a)*($p-$this->b)*($p-$this->c));
        
    }
}
