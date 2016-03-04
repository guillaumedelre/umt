<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ShipmentLogs
 *
 * @ORM\Table(name="shipment_logs", indexes={@ORM\Index(name="fk_shipment_logs_shipments1", columns={"shipment_id"}), @ORM\Index(name="fk_shipment_logs_users1", columns={"user_id"}), @ORM\Index(name="fk_shipment_logs_statuses1", columns={"status_id"})})
 * @ORM\Entity(repositoryClass="CoreBundle\Entity\Repository\ShipmentLogRepository")
 */
class ShipmentLog
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var \CoreBundle\Entity\Shipment
     *
     * @ORM\ManyToOne(targetEntity="Shipment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shipment_id", referencedColumnName="id")
     * })
     */
    private $shipment;

    /**
     * @var \CoreBundle\Entity\Status
     *
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;

    /**
     * @var \CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;
}

