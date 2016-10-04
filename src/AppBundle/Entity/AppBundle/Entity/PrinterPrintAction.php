<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Action to print something with the printer.
 *
 * @see http://schema.org/PrinterPrintAction Documentation on Schema.org
 *
 * @ORM\Entity
 * @Iri("http://schema.org/PrinterPrintAction")
 */
class PrinterPrintAction
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var \DateTime The endTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to end. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to \*December\*. Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime
     * @Iri("https://schema.org/endTime")
     */
    private $endTime;
    /**
     * @var PrinterMessage The object upon the action is carried out, whose state is kept intact or changed. Also known as the semantic roles patient, affected or undergoer (which change their state) or theme (which doesn't). e.g. John read \*a book\*
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\PrinterMessage")
     * @Iri("https://schema.org/object")
     */
    private $object;
    /**
     * @var \DateTime The startTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to start. For actions that span a period of time, when the action was performed. e.g. John wrote a book from \*January\* to December. Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime
     * @Iri("https://schema.org/startTime")
     */
    private $startTime;

    /**
     * Sets id.
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets endTime.
     *
     * @param \DateTime $endTime
     *
     * @return $this
     */
    public function setEndTime(\DateTime $endTime = null)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Gets endTime.
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Sets object.
     *
     * @param PrinterMessage $object
     *
     * @return $this
     */
    public function setObject(PrinterMessage $object = null)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Gets object.
     *
     * @return PrinterMessage
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Sets startTime.
     *
     * @param \DateTime $startTime
     *
     * @return $this
     */
    public function setStartTime(\DateTime $startTime = null)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Gets startTime.
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }
}
