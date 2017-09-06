<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
  /**
   * @Route("/", name="homepage")
   * @param Request $request
   * @return Response
   */
  public function indexAction(Request $request)
  {
    return $this->render('home/index.html.twig', array());
  }
}
