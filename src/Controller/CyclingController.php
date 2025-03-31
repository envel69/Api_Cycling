<?php

namespace App\Controller;

use App\Entity\Cycling;
use App\Repository\CyclingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/cycling', name: 'cycling')]
final class CyclingController extends AbstractController
{
    #[Route('/', name: '_list', methods: ['GET'])]
    public function index(CyclingRepository $repository, SerializerInterface  $serializer): JsonResponse
    {
        $cyclings = $repository->findAll();
        $data = $serializer->serialize($cyclings, 'json', ['groups' => 'cycling']);
        
        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }
    
    #[Route('/{id}', name: '_show', methods: ['GET'])]
    public function show(int $id, CyclingRepository $repository, SerializerInterface $serializer): JsonResponse
    {
        $cycling = $repository->find($id);
        if (!$cycling) {
            return new JsonResponse(['error' => 'Enregistrement non trouvé'], JsonResponse::HTTP_NOT_FOUND);
        }
        
        $data = $serializer->serialize($cycling, 'json', ['groups' => 'cycling']);
        return new JsonResponse($data, JsonResponse::HTTP_OK, [], true);
    }
    
    #[Route('/', name: '_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if (!$data) {
            return new JsonResponse(['error' => 'JSON invalide'], JsonResponse::HTTP_BAD_REQUEST);
        }
        
        $cycling = new Cycling();
        $cycling->setName($data['name'] ?? '');
        
        $em->persist($cycling);
        $em->flush();
        
        $jsonData = $serializer->serialize($cycling, 'json', ['groups' => 'cycling']);
        return new JsonResponse($jsonData, JsonResponse::HTTP_CREATED, [], true);
    }
    
    #[Route('/{id}', name: '_update', methods: ['PUT'])]
    public function update(
        int $id,
        Request $request,
        CyclingRepository $repository,
        EntityManagerInterface $em,
        SerializerInterface $serializer
    ): JsonResponse {
        $cycling = $repository->find($id);
        if (!$cycling) {
            return new JsonResponse(['error' => 'Enregistrement non trouvé'], JsonResponse::HTTP_NOT_FOUND);
        }
        
        $data = json_decode($request->getContent(), true);
        if (!$data) {
            return new JsonResponse(['error' => 'JSON invalide'], JsonResponse::HTTP_BAD_REQUEST);
        }
        
        if (isset($data['name'])) {
            $cycling->setName($data['name']);
        }
        
        $em->flush();
        
        $jsonData = $serializer->serialize($cycling, 'json', ['groups' => 'cycling']);
        return new JsonResponse($jsonData, JsonResponse::HTTP_OK, [], true);
    }
    
    #[Route('/{id}', name: '_delete', methods: ['DELETE'])]
    public function delete(int $id, CyclingRepository $repository, EntityManagerInterface $em): JsonResponse
    {
        $cycling = $repository->find($id);
        if (!$cycling) {
            return new JsonResponse(['error' => 'Enregistrement non trouvé'], JsonResponse::HTTP_NOT_FOUND);
        }
        
        $em->remove($cycling);
        $em->flush();
        
        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
