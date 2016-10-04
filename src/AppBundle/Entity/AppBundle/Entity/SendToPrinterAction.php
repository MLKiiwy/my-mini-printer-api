<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Action to send something to the printer.
 *
 * @see http://schema.org/SendToPrinterAction Documentation on Schema.org
 *
 * @ORM\Entity
 * @Iri("http://schema.org/SendToPrinterAction")
 */
class SendToPrinterAction
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
     * @var Person The direct performer or driver of the action (animate or inanimate). e.g. \*John\* wrote a book
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Person")
     * @Iri("https://schema.org/agent")
     */
    private $agent;
    /**
     * @var Application The object that helped the agent perform the action. e.g. John wrote a book with \*a pen\*
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Application")
     * @Iri("https://schema.org/instrument")
     */
    private $instrument;
    /**
     * @var string The object upon the action is carried out, whose state is kept intact or changed. Also known as the semantic roles patient, affected or undergoer (which change their state) or theme (which doesn't). e.g. John read \*a book\*
     *
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/object")
     */
    private $object;
    /**
     * @var PrinterMessage The result produced in the action. e.g. John wrote \*a book\*
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\PrinterMessage")
     * @Iri("https://schema.org/result")
     */
    private $result;
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
     * Sets agent.
     *
     * @param Person $agent
     *
     * @return $this
     */
    public function setAgent(Person $agent = null)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Gets agent.
     *
     * @return Person
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Sets instrument.
     *
     * @param Application $instrument
     *
     * @return $this
     */
    public function setInstrument(Application $instrument = null)
    {
        $this->instrument = $instrument;

        return $this;
    }

    /**
     * Gets instrument.
     *
     * @return Application
     */
    public function getInstrument()
    {
        return $this->instrument;
    }

    /**
     * Sets object.
     *
     * @param string $object
     *
     * @return $this
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Gets object.
     *
     * @return string
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Sets result.
     *
     * @param PrinterMessage $result
     *
     * @return $this
     */
    public function setResult(PrinterMessage $result = null)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Gets result.
     *
     * @return PrinterMessage
     */
    public function getResult()
    {
        return $this->result;
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
