<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * @ORM\Entity()
 * @ORM\Table(name="`user`")
 */
class User extends BaseUser
{
  /**
   * @ORM\Id()
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(name="first_name", type="string", length=255)
   *
   * @var string
   */
  protected $firstName;

  /**
   * @ORM\Column(name="last_name", type="string", length=255)
   *
   * @var string
   */
  protected $lastName;

  /**
   * @return string
   */
  public function getFullName()
  {
    return trim(sprintf('%s %s', $this->getFirstName(), $this->getLastName()));
  }

  /**
   * @param string $firstName
   * @return $this
   */
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;

    return $this;
  }

  /**
   * @return string
   */
  public function getFirstName()
  {
    return $this->firstName;
  }

  /**
   * @param string $lastName
   * @return $this
   */
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;

    return $this;
  }

  /**
   * @return string
   */
  public function getLastName()
  {
    return $this->lastName;
  }
}
