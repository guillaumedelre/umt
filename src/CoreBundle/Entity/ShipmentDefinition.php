<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ShipmentDefinitions
 *
 * @ORM\Table(name="shipment_definitions", indexes={@ORM\Index(name="country_id", columns={"country_id"}), @ORM\Index(name="customer_id", columns={"customer_id"})})
 * @ORM\Entity(repositoryClass="CoreBundle\Entity\Repository\ShipmentDefinitionRepository")
 */
class ShipmentDefinition
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="extrainfo", type="string", length=255, nullable=true)
     */
    private $extrainfo;

    /**
     * @var string
     *
     * @ORM\Column(name="streetname", type="string", length=255, nullable=true)
     */
    private $streetname;

    /**
     * @var string
     *
     * @ORM\Column(name="streetnumber", type="string", length=255, nullable=true)
     */
    private $streetnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=64, nullable=true)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="cityname", type="string", length=255, nullable=true)
     */
    private $cityname;

    /**
     * @var string
     *
     * @ORM\Column(name="paletization_firstname", type="string", length=255, nullable=true)
     */
    private $paletizationFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="paletization_lastname", type="string", length=255, nullable=true)
     */
    private $paletizationLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="paletization_extrainfo", type="string", length=255, nullable=true)
     */
    private $paletizationExtrainfo;

    /**
     * @var string
     *
     * @ORM\Column(name="paletization_streetname", type="string", length=255, nullable=true)
     */
    private $paletizationStreetname;

    /**
     * @var string
     *
     * @ORM\Column(name="paletization_streetnumber", type="string", length=255, nullable=true)
     */
    private $paletizationStreetnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="paletization_zipcode", type="string", length=64, nullable=true)
     */
    private $paletizationZipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="paletization_cityname", type="string", length=255, nullable=true)
     */
    private $paletizationCityname;

    /**
     * @var \CoreBundle\Entity\Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;

    /**
     * @var \CoreBundle\Entity\Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;
}

