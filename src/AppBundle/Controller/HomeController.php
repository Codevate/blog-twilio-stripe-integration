<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
  /**
   * @Route("/", name="homepage")
   * @return Response
   */
  public function indexAction()
  {
    return $this->render('home/index.html.twig', array(
      'posts' => $this->getDoctrine()->getRepository('AppBundle:Post')->getLatest(),
    ));
  }
}
