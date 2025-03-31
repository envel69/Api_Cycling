<?php

namespace App\Controller;

use App\Entity\Race;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/race', name: 'race')]
final class RaceController extends AbstractController
{
    #[Route('/', name: '_list', methods: ['GET'])]
    public function index(EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $races = $em->getRepository(Race::class)->findAll();
        $data = $serializer->serialize($races, 'json', ['groups' => 'race']);
        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }
    #[Route('/{id}', name: '_show', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $race = $em->getRepository(Race::class)->find($id);
        if (!$race) { return new JsonResponse(['error' => 'Not found'], JsonResponse::HTTP_NOT_FOUND); }
        $data = $serializer->serialize($race, 'json', ['groups' => 'race']);
        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }
}
