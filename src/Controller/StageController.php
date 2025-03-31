<?php

namespace App\Controller;

use App\Entity\Stage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/stage', name: 'stage')]
final class StageController extends AbstractController
{
    #[Route('/', name: '_list', methods: ['GET'])]
    public function index(EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $stages = $em->getRepository(Stage::class)->findAll();
        $data = $serializer->serialize($stages, 'json', ['groups' => 'stage']);
        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }
    #[Route('/{id}', name: '_show', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $stage = $em->getRepository(Stage::class)->find($id);
        if (!$stage) { return new JsonResponse(['error' => 'Not found'], JsonResponse::HTTP_NOT_FOUND); }
        $data = $serializer->serialize($stage, 'json', ['groups' => 'stage']);
        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }
}
