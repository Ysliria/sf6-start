<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hello', name: 'hello_world_')]
class HelloWorldController extends AbstractController
{
    #[Route(
        '/{name}',
        name: 'index',
        requirements: ['name' => "\w([-\w])*"],
        defaults: ['name' => 'world'],
        methods: ['GET']
    )]
    public function index($name): Response
    {
        $name = ucfirst($name);

        return new Response("<body>Hello $name!</body>");
    }
}
