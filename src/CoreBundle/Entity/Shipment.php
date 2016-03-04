<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Shipments
 *
 * @ORM\Table(name="shipments", indexes={@ORM\Index(name="fk_label_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_label_shipment_definition1_idx", columns={"shipment_definition_id"}), @ORM\Index(name="fk_shipments_statuses1", columns={"status_id"})})
 * @ORM\Entity(repositoryClass="CoreBundle\Entity\Repository\ShipmentRepository")
 *
 * @ExclusionPolicy("all")
 */
class Shipment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     *
     * @Expose
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     *
     * @Expose
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="extrainfo", type="string", length=255, nullable=true)
     *
     * @Expose
     */
    private $extrainfo;

    /**
     * @var string
     *
     * @ORM\Column(name="streetname", type="string", length=255, nullable=true)
     *
     * @Expose
     */
    private $streetname;

    /**
     * @var string
     *
     * @ORM\Column(name="streetnumber", type="string", length=255, nullable=true)
     *
     * @Expose
     */
    private $streetnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=64, nullable=true)
     *
     * @Expose
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="cityname", type="string", length=255, nullable=true)
     *
     * @Expose
     */
    private $cityname;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     *
     * @Expose
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="lasttrackingnumber", type="string", length=255, nullable=false)
     *
     * @Expose
     */
    private $lasttrackingnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="customerreference", type="string", length=255, nullable=true)
     *
     * @Expose
     */
    private $customerreference;

    /**
     * @var string
     *
     * @ORM\Column(name="newtrackingnumber", type="string", length=255, nullable=true)
     *
     * @Expose
     */
    private $newtrackingnumber;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", precision=10, scale=0, nullable=false)
     *
     * @Expose
     */
    private $weight = '2';

    /**
     * @var boolean
     *
     * @ORM\Column(name="isdraft", type="boolean", nullable=false)
     *
     * @Expose
     */
    private $isdraft = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="create")
     *
     * @Expose
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     *
     * @Expose
     */
    private $updatedAt;


    /**
     * @var \CoreBundle\Entity\ShipmentDefinition
     *
     * @ORM\ManyToOne(targetEntity="ShipmentDefinition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shipment_definition_id", referencedColumnName="id")
     * })
     *
     * @Expose
     */
    private $shipmentDefinition;

    /**
     * @var \CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     *
     * @Expose
     */
    private $user;

    /**
     * @var \CoreBundle\Entity\Status
     *
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     *
     * @Expose
     */
    private $status;
}

