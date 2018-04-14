<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Invitation;

interface InvitationRepositoryInterface
{
    /**
     * @param int $userId
     * @param int $offset
     * @param int $limit
     *
     * @return mixed
     */
    public function findSend(int $userId, int $offset, int $limit): array;

    /**
     * @param int $userId
     * @param int $offset
     * @param int $limit
     *
     * @return mixed
     */
    public function findReceived(int $userId, int $offset, int $limit): array;

    /**
     * @param Invitation $invitation
     */
    public function save(Invitation $invitation): void;

    /**
     * @param Invitation $invitation
     */
    public function remove(Invitation $invitation): void;
}
