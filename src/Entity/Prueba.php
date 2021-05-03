<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

//comando para crear las entidades a partir de la BBDD
# php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity

//para generar los getters y setters
//importante en la clase tener la anotacion para generar el repositorio
//@ORM\Entity(repositoryClass="App\Repository\MyClassRepository")

#php bin/console make:entity --regenerate App     //crear los set/getters y el repositorio


/**
 * Prueba
 *
 * @ORM\Table(name="prueba")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PruebaRepository")
 */
class Prueba
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="string", length=20, nullable=false)
     */
    private $clave;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getClave(): ?string
    {
        return $this->clave;
    }

    public function setClave(string $clave): self
    {
        $this->clave = $clave;

        return $this;
    }


}
