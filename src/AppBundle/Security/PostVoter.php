<?php

namespace AppBundle\Security;

use AppBundle\Entity\Post;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class PostVoter extends Voter
{
  const VIEW = 'view';

  private $requestStack;

  public function __construct(RequestStack $requestStack)
  {
    $this->requestStack = $requestStack;
  }

  protected function supports($attribute, $subject)
  {
    if (!in_array($attribute, [self::VIEW])) {
      return false;
    }

    return $subject instanceof Post;
  }

  protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
  {
    $user = $token->getUser();

    if (!$user instanceof User) {
      $user = null;
    }

    switch ($attribute) {
      case self::VIEW:
        return $this->canView($subject, $user);
      default:
        throw new \LogicException(sprintf('Unhandled attribute "%s"', $attribute));
    }
  }

  private function canView(Post $post, User $user = null)
  {
    if ($post->isPremium() && (!$user || !$user->isPremium())) {
      $this->requestStack->getCurrentRequest()->attributes->set('requires_premium', true);

      return false;
    }

    return true;
  }
}
