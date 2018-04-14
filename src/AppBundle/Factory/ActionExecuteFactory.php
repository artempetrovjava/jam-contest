<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle\Factory;

use AppBundle\Enum\ActionEnum;
use AppBundle\Exception\WrongActionException;

class ActionExecuteFactory
{
    protected $accept;
    protected $decline;
    protected $cancel;

    /**
     * ActionExecuteFactory constructor.
     *
     * @param Accept $accept
     * @param Decline $decline
     * @param Cancel $cancel
     */
    public function __construct(Accept $accept, Decline $decline, Cancel $cancel)
    {
        $this->accept = $accept;
        $this->decline = $decline;
        $this->cancel = $cancel;
    }

    /**
     * @param string $action
     *
     * @return ActionHandlerInterface
     * @throws WrongActionException
     */
    public function get(string $action): ActionHandlerInterface
    {
        switch ($action) {
            case ActionEnum::ACCEPT:
                return $this->accept;
            case ActionEnum::DECLINE:
                return $this->decline;
            case ActionEnum::CANCEL:
                return $this->cancel;

            default:
                throw new WrongActionException("No such action - {$action}");
        }
    }
}
