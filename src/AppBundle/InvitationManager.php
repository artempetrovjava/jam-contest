<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle;

use AppBundle\Dto\InvitationDto;
use AppBundle\Enum\GetInvitationType;
use AppBundle\Exception\WrongInvitationTypeException;
use AppBundle\Repository\InvitationRepositoryInterface;

class InvitationManager
{
    public const DEFAULT_LIMIT = 50;

    /** @var InvitationRepositoryInterface $invitationRepository */
    protected $invitationRepository;

    public function __construct(InvitationRepositoryInterface $invitationRepository)
    {
        $this->invitationRepository = $invitationRepository;
    }

    /**
     * @param InvitationDto $dto
     *
     * @return mixed
     * @throws WrongInvitationTypeException
     */
    public function getInvitations(InvitationDto $dto): array
    {
        switch ($dto->getType()) {
            case GetInvitationType::SEND:
                return $this->invitationRepository->findSend(
                    $dto->getUserId(),
                    $dto->getOffset(),
                    $dto->getLimit()
                );
            case GetInvitationType::RECEIVED:
                return $this->invitationRepository->findReceived(
                    $dto->getUserId(),
                    $dto->getOffset(),
                    $dto->getLimit()
                );

            default:
                throw new WrongInvitationTypeException("No such type = {$dto->getType()}");
        }
    }
}
