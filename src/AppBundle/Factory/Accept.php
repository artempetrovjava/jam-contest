<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle\Factory;

use AppBundle\Entity\Invitation;
use AppBundle\Enum\InvitationStatus;

class Accept extends AbstractActionHandler implements ActionHandlerInterface
{
    /**
     * @param Invitation $invitation
     */
    public function execute(Invitation $invitation): void
    {
        $invitation->setStatus(InvitationStatus::ACCEPTED);
        $this->invitationRepository->save($invitation);
    }
}
