<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * OffreVoyage
 *
 * @ORM\Table(name="offre_voyage")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\OffreVoyageRepository")
 */
class OffreVoyage
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
     * @var float
     *
     * @ORM\Column(name="prixOffre", type="float")
     */
    private $prixOffre;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrPlaceOffre", type="integer")
     */
    private $nbrPlaceOffre;

    /**
     * @var int
     *
     * @ORM\Column(name="isActive", type="integer")
     */
    private $isActive;
    

    /**
     * @ORM\OneToMany(targetEntity="Client", mappedBy="offreVoyage", cascade={"persist"})
     */
    private $client;

     /**
     * @ORM\OneToMany(targetEntity="Transport", mappedBy="offreVoyage", cascade={"persist"})
     */
    private $transport;

    /**
     * @ORM\OneToMany(targetEntity="Hotel", mappedBy="offreVoyage", cascade={"persist"})
     */
    private $hotel;

    public function __construct()
    {
        $this->client = new ArrayCollection();
        $this->transport = new ArrayCollection();
        $this->hotel = new ArrayCollection();
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
     * Set prixOffre.
     *
     * @param float $prixOffre
     *
     * @return OffreVoyage
     */
    public function setPrixOffre($prixOffre)
    {
        $this->prixOffre = $prixOffre;

        return $this;
    }

    /**
     * Get prixOffre.
     *
     * @return float
     */
    public function getPrixOffre()
    {
        return $this->prixOffre;
    }

    /**
     * Set nbrPlaceOffre.
     *
     * @param int $nbrPlaceOffre
     *
     * @return OffreVoyage
     */
    public function setNbrPlaceOffre($nbrPlaceOffre)
    {
        $this->nbrPlaceOffre = $nbrPlaceOffre;

        return $this;
    }

    /**
     * Get nbrPlaceOffre.
     *
     * @return int
     */
    public function getNbrPlaceOffre()
    {
        return $this->nbrPlaceOffre;
    }

    /**
     * Add client.
     *
     * @param \MainBundle\Entity\Client $client
     *
     * @return OffreVoyage
     */
    public function addClient(\MainBundle\Entity\Client $client)
    {
        $this->client[] = $client;

        return $this;
    }

    /**
     * Remove client.
     *
     * @param \MainBundle\Entity\Client $client
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeClient(\MainBundle\Entity\Client $client)
    {
        return $this->client->removeElement($client);
    }

    /**
     * Get client.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add transport.
     *
     * @param \MainBundle\Entity\Transport $transport
     *
     * @return OffreVoyage
     */
    public function addTransport(\MainBundle\Entity\Transport $transport)
    {
        $this->transport[] = $transport;

        return $this;
    }

    /**
     * Remove transport.
     *
     * @param \MainBundle\Entity\Transport $transport
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTransport(\MainBundle\Entity\Transport $transport)
    {
        return $this->transport->removeElement($transport);
    }

    /**
     * Get transport.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * Add hotel.
     *
     * @param \MainBundle\Entity\Hotel $hotel
     *
     * @return OffreVoyage
     */
    public function addHotel(\MainBundle\Entity\Hotel $hotel)
    {
        $this->hotel[] = $hotel;

        return $this;
    }

    /**
     * Remove hotel.
     *
     * @param \MainBundle\Entity\Hotel $hotel
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeHotel(\MainBundle\Entity\Hotel $hotel)
    {
        return $this->hotel->removeElement($hotel);
    }

    /**
     * Get hotel.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * Set isActive.
     *
     * @param int $isActive
     *
     * @return OffreVoyage
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive.
     *
     * @return int
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}
