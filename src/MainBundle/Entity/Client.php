<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="nomClient", type="string", length=255)
     */
    private $nomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomClient", type="string", length=255)
     */
    private $prenomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="telClient", type="string", length=255)
     */
    private $telClient;

    /**
     * @var string
     *
     * @ORM\Column(name="addresseClient", type="string", length=255)
     */
    private $addresseClient;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="emailClient", type="string", length=255)
     */
    private $emailClient;


     /**
     * @ORM\ManyToOne(targetEntity="OffreVoyage", inversedBy="client")
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
     * Set nomClient.
     *
     * @param string $nomClient
     *
     * @return Client
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    /**
     * Get nomClient.
     *
     * @return string
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * Set prenomClient.
     *
     * @param string $prenomClient
     *
     * @return Client
     */
    public function setPrenomClient($prenomClient)
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    /**
     * Get prenomClient.
     *
     * @return string
     */
    public function getPrenomClient()
    {
        return $this->prenomClient;
    }

    /**
     * Set telClient.
     *
     * @param string $telClient
     *
     * @return Client
     */
    public function setTelClient($telClient)
    {
        $this->telClient = $telClient;

        return $this;
    }

    /**
     * Get telClient.
     *
     * @return string
     */
    public function getTelClient()
    {
        return $this->telClient;
    }

    /**
     * Set addresseClient.
     *
     * @param string $addresseClient
     *
     * @return Client
     */
    public function setAddresseClient($addresseClient)
    {
        $this->addresseClient = $addresseClient;

        return $this;
    }

    /**
     * Get addresseClient.
     *
     * @return string
     */
    public function getAddresseClient()
    {
        return $this->addresseClient;
    }

    /**
     * Set ville.
     *
     * @param string $ville
     *
     * @return Client
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville.
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set emailClient.
     *
     * @param string $emailClient
     *
     * @return Client
     */
    public function setEmailClient($emailClient)
    {
        $this->emailClient = $emailClient;

        return $this;
    }

    /**
     * Get emailClient.
     *
     * @return string
     */
    public function getEmailClient()
    {
        return $this->emailClient;
    }

    /**
     * Set offreVoyage.
     *
     * @param \MainBundle\Entity\OffreVoyage|null $offreVoyage
     *
     * @return Client
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
