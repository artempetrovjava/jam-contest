<?php

namespace AppBundle\Entity;

/**
 * Invitation
 */
class Invitation
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $status;

    /**
     * @var User
     */
    private $sender;

    /**
     * @var User
     */
    private $receiver;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Invitation
     */
    public function setStatus(string $status): Invitation
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return User
     */
    public function getSender(): User
    {
        return $this->sender;
    }

    /**
     * @param User $sender
     *
     * @return Invitation
     */
    public function setSender(User $sender): Invitation
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * @return User
     */
    public function getReceiver(): User
    {
        return $this->receiver;
    }

    /**
     * @param User $receiver
     *
     * @return Invitation
     */
    public function setReceiver(User $receiver): Invitation
    {
        $this->receiver = $receiver;

        return $this;
    }
}
