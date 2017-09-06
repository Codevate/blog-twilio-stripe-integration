<?php

namespace AppBundle\EventSubscriber;

use AppBundle\Entity\User;
use AppBundle\Event\StripeEvent;
use Doctrine\ORM\EntityManagerInterface;
use Stripe\Charge;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StripeEventSubscriber implements EventSubscriberInterface
{
  private $em;

  public function __construct(EntityManagerInterface $em)
  {
    $this->em = $em;
  }

  public static function getSubscribedEvents()
  {
    return [
      'charge.refunded' => ['onChargeRefunded'],
    ];
  }

  public function onChargeRefunded(StripeEvent $event)
  {
    /** @var Charge $charge */
    $charge = $event->getResource();

    if ($charge->refunded) {
      /** @var User $user */
      $user = $this->em->getRepository(User::class)->findPremiumByChargeId($charge->id);

      if ($user) {
        $user->setPremium(false);
        $this->em->flush();
      }
    }
  }
}
