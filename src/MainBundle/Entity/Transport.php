<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transport
 *
 * @ORM\Table(name="transport")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\TransportRepository")
 */
class Transport
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
     * @ORM\Column(name="NomCompagne", type="string", length=255)
     */
    private $nomCompagne;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="datetime")
     */
    private $dateDepart;

    /**
     * @var float
     *
     * @ORM\Column(name="PrixTransport", type="float")
     */
    private $prixTransport;

    /**
     * @var string
     *
     * @ORM\Column(name="villeArrive", type="string", length=255)
     */
    private $villeArrive;

    /**
     * @var string
     *
     * @ORM\Column(name="villeDepart", type="string", length=255)
     */
    private $villeDepart;

     /**
     * @ORM\ManyToOne(targetEntity="OffreVoyage", inversedBy="transport")
     * @ORM\JoinColumn(name="offre_id", referencedColumnName="id")
     */
    private $offreVoyage;


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
     * Set nomCompagne.
     *
     * @param string $nomCompagne
     *
     * @return Transport
     */
    public function setNomCompagne($nomCompagne)
    {
        $this->nomCompagne = $nomCompagne;

        return $this;
    }

    /**
     * Get nomCompagne.
     *
     * @return string
     */
    public function getNomCompagne()
    {
        return $this->nomCompagne;
    }

    /**
     * Set dateDepart.
     *
     * @param \DateTime $dateDepart
     *
     * @return Transport
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart.
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set prixTransport.
     *
     * @param float $prixTransport
     *
     * @return Transport
     */
    public function setPrixTransport($prixTransport)
    {
        $this->prixTransport = $prixTransport;

        return $this;
    }

    /**
     * Get prixTransport.
     *
     * @return float
     */
    public function getPrixTransport()
    {
        return $this->prixTransport;
    }

    /**
     * Set villeArrive.
     *
     * @param string $villeArrive
     *
     * @return Transport
     */
    public function setVilleArrive($villeArrive)
    {
        $this->villeArrive = $villeArrive;

        return $this;
    }

    /**
     * Get villeArrive.
     *
     * @return string
     */
    public function getVilleArrive()
    {
        return $this->villeArrive;
    }

    /**
     * Set villeDepart.
     *
     * @param string $villeDepart
     *
     * @return Transport
     */
    public function setVilleDepart($villeDepart)
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    /**
     * Get villeDepart.
     *
     * @return string
     */
    public function getVilleDepart()
    {
        return $this->villeDepart;
    }

    /**
     * Set offreVoyage.
     *
     * @param \MainBundle\Entity\OffreVoyage|null $offreVoyage
     *
     * @return Transport
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
}
