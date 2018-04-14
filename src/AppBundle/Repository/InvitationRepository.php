<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Invitation;
use Doctrine\ORM\EntityRepository;
use function Symfony\Component\VarDumper\Tests\Fixtures\bar;

/**
 * InvitationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InvitationRepository extends EntityRepository implements InvitationRepositoryInterface
{
    /**
     * @param int $userId
     * @param int $offset
     * @param int $limit
     *
     * @return mixed
     */
    public function findSend(int $userId, int $offset, int $limit): array
    {
        $qb = $this->_em->createQueryBuilder();

        $qb->select('i.id, i.status, r.firstName, r.lastName')
            ->from(Invitation::class, 'i')
            ->where('i.user_sender_id = ?1')
            ->setParameter(1, $userId)
            ->leftJoin('i.receiver', 'r')
            ->setFirstResult($offset)
            ->setMaxResults($limit);

        return $qb->getQuery()->getArrayResult();
    }

    /**
     * @param int $userId
     * @param int $offset
     * @param int $limit
     *
     * @return array
     */
    public function findReceived(int $userId, int $offset, int $limit): array
    {
        $qb = $this->_em->createQueryBuilder();

        $qb->select('i, s.firstName, s.lastName')
            ->from(Invitation::class, 'i')
            ->where('i.user_receiver_id = ?1')
            ->setParameter(1, $userId)
            ->leftJoin('i.sender', 's')
            ->setFirstResult($offset)
            ->setMaxResults($limit);

        return $qb->getQuery()->getArrayResult();
    }

    /**
     * @param Invitation $invitation
     *
     * @return void
     * @throws \Doctrine\ORM\ORMInvalidArgumentException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Invitation $invitation): void
    {
        $this->_em->persist($invitation);
        $this->_em->flush();
    }

    /**
     * @param Invitation $invitation
     *
     * @throws \Doctrine\ORM\ORMInvalidArgumentException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function remove(Invitation $invitation): void
    {
        $this->_em->remove($invitation);
        $this->_em->flush();
    }
}
