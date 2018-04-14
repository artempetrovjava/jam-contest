<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle\Repository;

interface InvitationRepositoryInterface
{
    /**
     * @param int $userId
     * @param int $offset
     * @param int $limit
     *
     * @return mixed
     */
    public function findSend(int $userId, int $offset, int $limit);

    /**
     * @param int $userId
     * @param int $offset
     * @param int $limit
     *
     * @return mixed
     */
    public function findReceived(int $userId, int $offset, int $limit);
}
