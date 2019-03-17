<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chambre
 *
 * @ORM\Table(name="chambre")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\ChambreRepository")
 */
class Chambre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="typeChambre", type="string", length=255)
     */
    private $typeChambre;

    /**
     * @var string
     *
     * @ORM\Column(name="nbrLits", type="integer")
     */
    private $nbrLits;

    /**
     * @var float
     *
     * @ORM\Column(name="PrixChambre", type="float")
     */
    private $prixChambre;

     /**
     * @ORM\ManyToOne(targetEntity="Hotel", inversedBy="chambre")
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     */
    private $hotel;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set typeChambre.
     *
     * @param string $typeChambre
     *
     * @return Chambre
     */
    public function setTypeChambre($typeChambre)
    {
        $this->typeChambre = $typeChambre;

        return $this;
    }

    /**
     * Get typeChambre.
     *
     * @return string
     */
    public function getTypeChambre()
    {
        return $this->typeChambre;
    }

    /**
     * Set nbrLits.
     *
     * @param string $nbrLits
     *
     * @return Chambre
     */
    public function setNbrLits($nbrLits)
    {
        $this->nbrLits = $nbrLits;

        return $this;
    }

    /**
     * Get nbrLits.
     *
     * @return string
     */
    public function getNbrLits()
    {
        return $this->nbrLits;
    }

    /**
     * Set prixChambre.
     *
     * @param float $prixChambre
     *
     * @return Chambre
     */
    public function setPrixChambre($prixChambre)
    {
        $this->prixChambre = $prixChambre;

        return $this;
    }

    /**
     * Get prixChambre.
     *
     * @return float
     */
    public function getPrixChambre()
    {
        return $this->prixChambre;
    }

    /**
     * Set hotel.
     *
     * @param \MainBundle\Entity\Hotel|null $hotel
     *
     * @return Chambre
     */
    public function setHotel(\MainBundle\Entity\Hotel $hotel = null)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel.
     *
     * @return \MainBundle\Entity\Hotel|null
     */
    public function getHotel()
    {
        return $this->hotel;
    }
}
