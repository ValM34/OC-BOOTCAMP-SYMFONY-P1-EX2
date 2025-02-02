<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
  #[Route('/', name: 'app_accueil')]
  public function accueil(): Response
  {
    return $this->render('accueil/accueil.html.twig');
  }
}
