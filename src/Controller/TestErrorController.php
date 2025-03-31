<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/test-error', name: 'test_error', methods: ['GET'])]
class TestErrorController extends AbstractController
{
    public function __invoke(): void
    {
        throw new \Exception("Test d'erreur");
    }
}
