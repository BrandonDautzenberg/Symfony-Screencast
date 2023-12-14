<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Holy Wars', 'artist' => 'Megadeth'],
            ['song' => 'Powerslave', 'artist' => 'Iron Maiden'],
            ['song' => 'Ace of Spades', 'artist' => 'Motörhead'],
            ['song' => 'Scorpio Curse', 'artist' => 'Electric Wizard'],
            ['song' => 'Pillars of Sand', 'artist' => 'Vektor'],
        ];

        return $this->render('vinyl/homepage.html.twig', ['title' => 'PB & Jams', 'tracks' => $tracks,]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = 'Genre: '.u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'All Genres';
        }

        return new Response($title);
    }
}
