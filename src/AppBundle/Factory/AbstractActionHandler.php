<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle\Factory;

use AppBundle\Repository\InvitationRepositoryInterface;

abstract class AbstractActionHandler
{
    protected $invitationRepository;

    /**
     * AbstractActionHandler constructor.
     *
     * @param InvitationRepositoryInterface $invitationRepository
     */
    public function __construct(InvitationRepositoryInterface $invitationRepository)
    {
        $this->invitationRepository = $invitationRepository;
    }
}
