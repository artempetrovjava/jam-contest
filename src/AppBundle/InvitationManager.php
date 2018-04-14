<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle;

use AppBundle\Dto\InvitationDto;
use AppBundle\Entity\Invitation;
use AppBundle\Enum\GetInvitationType;
use AppBundle\Enum\InvitationStatus;
use AppBundle\Exception\AlreadySendFriendRequestException;
use AppBundle\Exception\InvitationException;
use AppBundle\Exception\WrongInvitationTypeException;
use AppBundle\Factory\ActionExecuteFactory;
use AppBundle\Repository\InvitationRepository;
use AppBundle\Repository\InvitationRepositoryInterface;
use AppBundle\Repository\UserRepository;
use AppBundle\Repository\UserRepositoryInterface;

class InvitationManager
{
    public const DEFAULT_LIMIT = 50;

    /** @var InvitationRepository $invitationRepository */
    protected $invitationRepository;
    /** @var UserRepository $userRepository */
    protected $userRepository;
    /** @var ActionExecuteFactory $actionFactory */
    protected $actionFactory;

    public function __construct(
        InvitationRepositoryInterface $invitationRepository,
        UserRepositoryInterface $userRepository,
        ActionExecuteFactory $actionFactory
    ) {
        $this->invitationRepository = $invitationRepository;
        $this->userRepository = $userRepository;
        $this->actionFactory = $actionFactory;
    }

    /**
     * @param InvitationDto $dto
     *
     * @return array
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

    /**
     * @param int $senderId
     * @param int $receiverId
     *
     * @throws AlreadySendFriendRequestException
     */
    public function sendInvitation(int $senderId, int $receiverId): void
    {
        $sender = $this->userRepository->find($senderId);
        $receiver = $this->userRepository->find($receiverId);

        $invite = $this->invitationRepository->findOneBy(['sender' => $sender, 'receiver' => $receiver]);

        if (null !== $invite) {
            throw new AlreadySendFriendRequestException('You already send friend request');
        }

        $invitation = new Invitation();
        $invitation->setSender($sender)
            ->setReceiver($receiver)
            ->setStatus(InvitationStatus::PENDING);

        $this->invitationRepository->save($invitation);
    }

    /**
     * @param int $inviteId
     * @param string $action
     *
     * @throws InvitationException
     */
    public function executeRequestAction(int $inviteId, string $action)
    {
        $invitation = $this->invitationRepository->find($inviteId);
        if(null === $invitation) {
            throw new InvitationException('No such invitation!');
        }

        $this->actionFactory->get($action)->execute($invitation);
    }
}
