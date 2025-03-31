<?php

namespace App\Controller;

use App\Entity\Team;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/team', name: 'team')]
final class TeamController extends AbstractController
{
    #[Route('/', name: '_list', methods: ['GET'])]
    public function index(EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $teams = $em->getRepository(Team::class)->findAll();
        $data = $serializer->serialize($teams, 'json', ['groups' => 'team']);
        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }
    #[Route('/{id}', name: '_show', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $team = $em->getRepository(Team::class)->find($id);
        if (!$team) { return new JsonResponse(['error' => 'Not found'], JsonResponse::HTTP_NOT_FOUND); }
        $data = $serializer->serialize($team, 'json', ['groups' => 'team']);
        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }
}
