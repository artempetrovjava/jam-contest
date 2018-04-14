<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle\Factory;

use AppBundle\Entity\Invitation;

interface ActionHandlerInterface
{
    /**
     * @param Invitation $invite
     */
    public function execute(Invitation $invite): void;
}
