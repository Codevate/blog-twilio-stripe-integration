<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
  /** @var ContainerInterface */
  private $container;

  public function setContainer(ContainerInterface $container = null)
  {
    $this->container = $container;
  }

  /**
   * @param ObjectManager $manager
   */
  public function load(ObjectManager $manager)
  {
    $userManager = $this->container->get('fos_user.user_manager');
    $user = $userManager->createUser();

    $user->setUsername('test');
    $user->setPlainPassword('test');
    $user->setEmail('test@example.com');
    $user->setFirstName('John');
    $user->setLastName('Smith');
    $user->setEnabled(true);

    $userManager->updateUser($user);
  }
}
