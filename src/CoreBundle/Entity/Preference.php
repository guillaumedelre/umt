<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Preferences
 *
 * @ORM\Table(name="preferences")
 * @ORM\Entity
 */
class Preference
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
     * @ORM\Column(name="app_title", type="string", length=255, nullable=false)
     */
    private $appTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="app_author", type="string", length=255, nullable=false)
     */
    private $appAuthor;

    /**
     * @var string
     *
     * @ORM\Column(name="app_copyright", type="string", length=255, nullable=false)
     */
    private $appCopyright;

    /**
     * @var string
     *
     * @ORM\Column(name="app_version", type="string", length=255, nullable=false)
     */
    private $appVersion;

    /**
     * @var integer
     *
     * @ORM\Column(name="statuses_retention", type="integer", nullable=false)
     */
    private $statusesRetention;

    /**
     * @var string
     *
     * @ORM\Column(name="xtrace_link", type="string", length=255, nullable=true)
     */
    private $xtraceLink;

    /**
     * @var integer
     *
     * @ORM\Column(name="delay_before_deletion", type="integer", nullable=false)
     */
    private $delayBeforeDeletion;

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

