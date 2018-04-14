<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle\Factory;

use AppBundle\Entity\Invitation;

class Cancel extends AbstractActionHandler implements ActionHandlerInterface
{
    /**
     * @param Invitation $invitation
     */
    public function execute(Invitation $invitation): void
    {
        $this->invitationRepository->remove($invitation);
    }
}
