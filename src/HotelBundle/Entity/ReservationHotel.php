<?php

namespace HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservationHotel
 *
 * @ORM\Table(name="reservation_hotel")
 * @ORM\Entity
 */
class ReservationHotel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idReservation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreservation;

    /**
     * @var integer
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     */
    private $idclient;
    /**
     * @ORM\ManyToOne(targetEntity="Hotel")
     * @ORM\JoinColumn(name="idHotel", referencedColumnName="idHotel")
     */
    private $idhotel;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_indiv", type="integer", nullable=true)
     */
    private $nbreIndiv;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_double", type="integer", nullable=true)
     */
    private $nbreDouble;


    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;
    /**
     * Get idreservation
     *
     * @return integer
     */
    public function getIdreservation()
    {
        return $this->idreservation;
    }

    /**
     * Set idclient
     *
     * @param integer $idclient
     *
     * @return ReservationHotel
     */
    public function setIdclient($idclient)
    {
        $this->idclient = $idclient;

        return $this;
    }

    /**
     * Get idclient
     *
     * @return integer
     */
    public function getIdclient()
    {
        return $this->idclient;
    }

    /**
     * Set idhotel
     *
     * @param integer $idhotel
     *
     * @return ReservationHotel
     */
    public function setIdhotel($idhotel)
    {
        $this->idhotel = $idhotel;

        return $this;
    }

    /**
     * Get idhotel
     *
     * @return integer
     */
    public function getIdhotel()
    {
        return $this->idhotel;
    }

    /**
     * Set nbreIndiv
     *
     * @param integer $nbreIndiv
     *
     * @return ReservationHotel
     */
    public function setNbreIndiv($nbreIndiv)
    {
        $this->nbreIndiv = $nbreIndiv;

        return $this;
    }

    /**
     * Get nbreIndiv
     *
     * @return integer
     */
    public function getNbreIndiv()
    {
        return $this->nbreIndiv;
    }

    /**
     * Set nbreDouble
     *
     * @param integer $nbreDouble
     *
     * @return ReservationHotel
     */
    public function setNbreDouble($nbreDouble)
    {
        $this->nbreDouble = $nbreDouble;

        return $this;
    }

    /**
     * Get nbreDouble
     *
     * @return integer
     */
    public function getNbreDouble()
    {
        return $this->nbreDouble;
    }

    /**
     * Set hotel
     *
     * @param \HotelBundle\Entity\Hotel $hotel
     *
     * @return ReservationHotel
     */
    public function setHotel(\HotelBundle\Entity\Hotel $hotel = null)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \HotelBundle\Entity\Hotel
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return ReservationHotel
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }
}
