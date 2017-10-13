<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PhoneNumber;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twilio\Twiml;

/**
 * @Route("/twilio", defaults={"_format"="xml"})
 */
class TwilioController extends Controller
{
  const MAX_RETRIES = 3;

  private $voiceEngine = ['voice' => 'woman', 'language' => 'en'];

  /**
   * @Route("/voice/verify", name="twilio_voice_verify")
   * @param Request $request
   * @return Response
   */
  public function voiceVerifyAction(Request $request)
  {
    $response = new Twiml();
    $retries = $request->query->get('retries', 0);

    if ($retries >= self::MAX_RETRIES) {
      $response->say('Goodbye.', $this->voiceEngine);

      return new Response($response);
    }

    $retryUrl = $this->generateUrl('twilio_voice_verify', ['retries' => ++$retries], UrlGeneratorInterface::ABSOLUTE_URL);

    if (!$request->request->has('Digits')) {
      $gather = $response->gather(['timeout' => 5, 'numDigits' => PhoneNumber::CODE_LENGTH]);

      $gather->say(sprintf('Please enter your %d digit verification code.', PhoneNumber::CODE_LENGTH), $this->voiceEngine);
      $response->redirect($retryUrl, ['method' => 'GET']);

      return new Response($response);
    }

    $manager = $this->getDoctrine()->getManager();
    $user = $manager->getRepository(User::class)->findOneBy([
      'phoneNumber.number' => $request->request->get('To'),
      'phoneNumber.verificationCode' => $request->request->get('Digits'),
    ]);

    if ($user) {
      $response->say('You have been upgraded to premium, goodbye.', $this->voiceEngine);
      $user->getPhoneNumber()->setVerified(true);
      $user->setPremium(true);
      $manager->flush();
    } else {
      $response->say('Sorry, this code was not recognised.', $this->voiceEngine);
      $response->redirect($retryUrl, ['method' => 'GET']);
    }

    return new Response($response);
  }
}
