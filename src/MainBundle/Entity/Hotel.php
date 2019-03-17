<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\HotelRepository")
 */
class Hotel
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
     * @var int
     *
     * @ORM\Column(name="nbrEtoile", type="integer")
     */
    private $nbrEtoile;

    /**
     * @var string
     *
     * @ORM\Column(name="villeHotel", type="string", length=255)
     */
    private $villeHotel;

    /**
     * @ORM\ManyToOne(targetEntity="OffreVoyage", inversedBy="hotel")
     * @ORM\JoinColumn(name="offre_id", referencedColumnName="id")
     */
    private $offreVoyage;

    /**
     * @ORM\OneToMany(targetEntity="Chambre", mappedBy="hotel", cascade={"persist"})
     */
    private $chambre;

    public function __construct()
    {
        $this->chambre = new ArrayCollection();
    }


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
     * Set nbrEtoile.
     *
     * @param int $nbrEtoile
     *
     * @return Hotel
     */
    public function setNbrEtoile($nbrEtoile)
    {
        $this->nbrEtoile = $nbrEtoile;

        return $this;
    }

    /**
     * Get nbrEtoile.
     *
     * @return int
     */
    public function getNbrEtoile()
    {
        return $this->nbrEtoile;
    }

    /**
     * Set villeHotel.
     *
     * @param string $villeHotel
     *
     * @return Hotel
     */
    public function setVilleHotel($villeHotel)
    {
        $this->villeHotel = $villeHotel;

        return $this;
    }

    /**
     * Get villeHotel.
     *
     * @return string
     */
    public function getVilleHotel()
    {
        return $this->villeHotel;
    }

    /**
     * Set offreVoyage.
     *
     * @param \MainBundle\Entity\OffreVoyage|null $offreVoyage
     *
     * @return Hotel
     */
    public function setOffreVoyage(\MainBundle\Entity\OffreVoyage $offreVoyage = null)
    {
        $this->offreVoyage = $offreVoyage;

        return $this;
    }

    /**
     * Get offreVoyage.
     *
     * @return \MainBundle\Entity\OffreVoyage|null
     */
    public function getOffreVoyage()
    {
        return $this->offreVoyage;
    }

    /**
     * Add chambre.
     *
     * @param \MainBundle\Entity\Chambre $chambre
     *
     * @return Hotel
     */
    public function addChambre(\MainBundle\Entity\Chambre $chambre)
    {
        $this->chambre[] = $chambre;

        return $this;
    }

    /**
     * Remove chambre.
     *
     * @param \MainBundle\Entity\Chambre $chambre
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeChambre(\MainBundle\Entity\Chambre $chambre)
    {
        return $this->chambre->removeElement($chambre);
    }

    /**
     * Get chambre.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChambre()
    {
        return $this->chambre;
    }
}
