<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;

use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(Environment $twig): Response
    {
        $tracks = [
            ['song' => 'Holy Wars', 'artist' => 'Megadeth'],
            ['song' => 'Powerslave', 'artist' => 'Iron Maiden'],
            ['song' => 'Ace of Spades', 'artist' => 'Motörhead'],
            ['song' => 'Scorpio Curse', 'artist' => 'Electric Wizard'],
            ['song' => 'Pillars of Sand', 'artist' => 'Vektor'],
        ];

        $html = $twig->render('vinyl/homepage.html.twig', ['title' => 'PB & Jams', 'tracks' => $tracks,]);

        return new Response($html);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig', ['genre' => $genre

        ]);
    }
}
