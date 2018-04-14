<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle\Dto;

class InvitationDto
{
    /** @var int */
    protected $userId;
    /** @var string */
    protected $type;
    /** @var int */
    protected $offset;
    /** @var int */
    protected $limit;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     *
     * @return InvitationDto
     */
    public function setUserId(int $userId): InvitationDto
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return InvitationDto
     */
    public function setType(string $type): InvitationDto
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     *
     * @return InvitationDto
     */
    public function setOffset(int $offset): InvitationDto
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     *
     * @return InvitationDto
     */
    public function setLimit(int $limit): InvitationDto
    {
        $this->limit = $limit;

        return $this;
    }
}