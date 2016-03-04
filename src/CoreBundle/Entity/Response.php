<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Responses
 *
 * @ORM\Table(name="responses", indexes={@ORM\Index(name="fk_responses_questions1", columns={"question_id"})})
 * @ORM\Entity(repositoryClass="CoreBundle\Entity\Repository\ResponseRepository")
 *
 * @ExclusionPolicy("all")
 */
class Response
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
     * @ORM\Column(name="response", type="text", length=65535, nullable=false)
     *
     * @Expose
     */
    private $response;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=false)
     *
     * @Expose
     */
    private $position;

    /**
     * @var \CoreBundle\Entity\Question
     *
     * @ORM\ManyToOne(targetEntity="Question")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * })
     *
     * @Expose
     */
    private $question;

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
}

