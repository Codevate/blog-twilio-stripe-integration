<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PhoneNumber;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/premium")
 */
class PremiumController extends Controller
{
  /**
   * @Route("/", name="premium_index")
   * @return Response
   */
  public function indexAction()
  {
    return $this->render(':premium:index.html.twig');
  }

  /**
   * @Route("/verify", options={"expose"="true"}, name="premium_verify")
   * @param Request $request
   * @return Response
   */
  public function verifyAction(Request $request)
  {
    return $this->render(':premium:verify.html.twig');
  }

  /**
   * @Route("/payment", name="premium_payment")
   * @param Request $request
   * @return Response
   */
  public function paymentAction(Request $request)
  {
    return $this->render(':premium:payment.html.twig');
  }
}
