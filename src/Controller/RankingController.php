<?php

namespace App\Controller;

use App\Entity\Ranking;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/ranking', name: 'ranking')]
final class RankingController extends AbstractController
{
    #[Route('/', name: '_list', methods: ['GET'])]
    public function index(EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $rankings = $em->getRepository(Ranking::class)->findAll();
        $data = $serializer->serialize($rankings, 'json', ['groups' => 'ranking']);
        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }
    #[Route('/{id}', name: '_show', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $ranking = $em->getRepository(Ranking::class)->find($id);
        if (!$ranking) { return new JsonResponse(['error' => 'Not found'], JsonResponse::HTTP_NOT_FOUND); }
        $data = $serializer->serialize($ranking, 'json', ['groups' => 'ranking']);
        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }
}
    