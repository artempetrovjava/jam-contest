<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle\Controller;

use AppBundle\Dto\InvitationDto;
use AppBundle\Exception\AlreadySendFriendRequestException;
use AppBundle\Exception\WrongInvitationTypeException;
use AppBundle\InvitationManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InvitationController extends Controller
{
    /** @var InvitationManager $manager */
    protected $manager;

    public function __construct(InvitationManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param string $type
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \AppBundle\Exception\WrongInvitationTypeException
     */
    public function listAction(string $type, Request $request): JsonResponse
    {
        $dto = new InvitationDto();
        $limit = $request->get('limit', InvitationManager::DEFAULT_LIMIT);
        $userId = $request->get('userId');
        $offset = $request->get('offset', 0);

        $dto->setLimit($limit)
            ->setOffset($offset)
            ->setType($type)
            ->setUserId($userId);

        try {
            $invitations = $this->manager->getInvitations($dto);
        } catch (WrongInvitationTypeException $e) {
            return $this->json(['error' => $e->getMessage()], 400);
        }

        return $this->json(['invitations' => $invitations]);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function sendAction(Request $request): JsonResponse
    {
        $senderId = $request->get('senderId');
        $receiverId = $request->get('receiverId');

        try {
            $this->manager->sendInvitation($senderId, $receiverId);
        } catch (AlreadySendFriendRequestException $e) {
            return $this->json(['error' => $e->getMessage()], 400);
        }

        // replace this example code with whatever you need
        return $this->json(['success' => true]);
    }

    /**
     * @param string $id
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function actionAction(string $id): JsonResponse
    {
        // replace this example code with whatever you need
        return $this->json(['success' => true]);
    }
}
