<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hello', name: 'hello_world_')]
class HelloWorldController extends AbstractController
{
    #[Route('/{name}', name: 'index', requirements: ['name' => "\w+"], methods: ['GET'])]
    public function index($name): Response
    {
        return new Response("Hello $name");
    }
}
