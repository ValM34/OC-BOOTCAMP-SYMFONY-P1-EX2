<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
  public function __construct(
    private UrlGeneratorInterface $urlGenerator,
  ) {}

  public function handle(Request $request, AccessDeniedException $accessDeniedException): ?Response
  {
    $route = $request->headers->get('referer');

    if($route === null) {
      return new RedirectResponse($this->urlGenerator->generate('app_projets'));
    }

    return new RedirectResponse($route);
  }
}
