<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 14.04.2018
 */

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InvitationController extends Controller
{
    /**
     * @param string $type
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function listAction(string $type): JsonResponse
    {
        // replace this example code with whatever you need
        return $this->json(['success' => true]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function sendAction(): JsonResponse
    {
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
