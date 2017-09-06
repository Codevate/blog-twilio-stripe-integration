<?php

namespace AppBundle\EventSubscriber;

use AppBundle\Controller\TwilioController;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Twilio\Security\RequestValidator;

class TwilioRequestListener
{
  const SIGNATURE_HEADER = 'X-Twilio-Signature';

  private $validator;

  public function __construct(RequestValidator $validator)
  {
    $this->validator = $validator;
  }

  public function onKernelController(FilterControllerEvent $event)
  {
    $controller = $event->getController();

    if (!is_array($controller)) {
      return;
    }

    if ($controller[0] instanceof TwilioController) {
      $request = $event->getRequest();
      $signature = $request->headers->get(self::SIGNATURE_HEADER);

      if (is_null($signature)) {
        throw new BadRequestHttpException(sprintf('Missing header %s', self::SIGNATURE_HEADER));
      }

      $valid = $this->validator->validate(
        $signature,
        $request->getSchemeAndHttpHost().$request->getBaseUrl().$request->getRequestUri(),
        $request->request->all()
      );

      if (!$valid) {
        throw new BadRequestHttpException('Invalid Twilio payload');
      }
    }
  }
}
