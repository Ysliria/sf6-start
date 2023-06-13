<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movie', name: 'movie_')]
class MovieController extends AbstractController
{
    public const MOVIES = [
        [
            'title'      => 'Blade Runner',
            'releasedAt' => '1982',
            'synopsis'   => "Les blade runners sont les policiers chargés de tuer (« retirer ») les réplicants qui ont contrevenu aux lois. Rick Deckard (Harrison Ford) : personnage principal du film. En tant que blade runner, il est chargé de traquer les réplicants déclarés illégaux.",
            'director'   => 'Ridley Scott'
        ],
        [
            'title'      => 'Minority Report',
            'releasedAt' => '2002',
            'synopsis'   => "En 2054, la société du futur a éradiqué les crimes en se dotant d'un système de prévention, détection et répression le plus sophistiqué du monde. Dissimulés de tous, trois extras-lucides transmettent les images des crimes à venir aux policiers de la Précrime.",
            'director'   => 'Steven Spielberg'
        ],
        [
            'title'      => 'Dune',
            'releasedAt' => '2021',
            'synopsis'   => "Paul Atreides, un jeune homme brillant et doué au destin plus grand que lui-même, doit se rendre sur la planète la plus dangereuse de l'univers afin d'assurer l'avenir de sa famille et de son peuple.",
            'director'   => 'Denis Villeneuve'
        ],
    ];

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(MovieRepository $movieRepository): Response
    {
        return $this->render('movie/index.html.twig', [
            'movies' => $movieRepository->findAll(),
        ]);
    }

    #[Route('/{movie}', name: 'show', requirements: ['movie' => '\d+'], defaults: ['movie' => 1], methods: ['GET'])]
    public function show(Movie $movie): Response
    {
        return $this->render('movie/show.html.twig', [
            'movie' => $movie
        ]);
    }
}
