<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A printer message.
 *
 * @see http://schema.org/PrinterMessage Documentation on Schema.org
 *
 * @ORM\Entity
 * @Iri("http://schema.org/PrinterMessage")
 */
class PrinterMessage
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
     * @var string The actual content of the printer message
     *
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/printerMessageBody")
     */
    private $printerMessageBody;
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     * @Assert\DateTime
     * @Assert\NotNull
     */
    private $dateReceived;
    /**
     * @var Person
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Person")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $sender;
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     * @Assert\DateTime
     * @Assert\NotNull
     */
    private $dateRead;

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
     * Sets printerMessageBody.
     *
     * @param string $printerMessageBody
     *
     * @return $this
     */
    public function setPrinterMessageBody($printerMessageBody)
    {
        $this->printerMessageBody = $printerMessageBody;

        return $this;
    }

    /**
     * Gets printerMessageBody.
     *
     * @return string
     */
    public function getPrinterMessageBody()
    {
        return $this->printerMessageBody;
    }

    /**
     * Sets dateReceived.
     *
     * @param \DateTime $dateReceived
     *
     * @return $this
     */
    public function setDateReceived(\DateTime $dateReceived)
    {
        $this->dateReceived = $dateReceived;

        return $this;
    }

    /**
     * Gets dateReceived.
     *
     * @return \DateTime
     */
    public function getDateReceived()
    {
        return $this->dateReceived;
    }

    /**
     * Sets sender.
     *
     * @param Person $sender
     *
     * @return $this
     */
    public function setSender(Person $sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Gets sender.
     *
     * @return Person
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Sets dateRead.
     *
     * @param \DateTime $dateRead
     *
     * @return $this
     */
    public function setDateRead(\DateTime $dateRead)
    {
        $this->dateRead = $dateRead;

        return $this;
    }

    /**
     * Gets dateRead.
     *
     * @return \DateTime
     */
    public function getDateRead()
    {
        return $this->dateRead;
    }
}
