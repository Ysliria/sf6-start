<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movie', name: 'movie_')]
class MovieController extends AbstractController
{
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

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, MovieRepository $movieRepository): Response
    {
        $movie     = new Movie();
        $movieForm = $this->createForm(MovieType::class, $movie);

        $movieForm->handleRequest($request);

        if ($movieForm->isSubmitted() && $movieForm->isValid()) {
            $movieRepository->save($movie, true);

            return $this->redirectToRoute('movie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('movie/new.html.twig', [
            'movie_form' => $movieForm
        ]);
    }

    #[Route('/{movie}/update', name: 'update', requirements: ['movie' => '\d+'], methods: ['GET', 'POST'])]
    public function update(Movie $movie, Request $request, MovieRepository $movieRepository): Response
    {
        $movieForm = $this->createForm(MovieType::class, $movie);

        $movieForm->handleRequest($request);

        if ($movieForm->isSubmitted() && $movieForm->isValid()) {
            $movieRepository->save($movie, true);

            return $this->redirectToRoute('movie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('movie/update.html.twig', [
            'movie_form' => $movieForm,
            'movie' => $movie
        ]);
    }
}
