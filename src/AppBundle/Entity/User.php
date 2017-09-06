<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\HasPremium;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="`user`")
 */
class User extends BaseUser
{
  use HasPremium;

  /**
   * @var int
   *
   * @ORM\Id()
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string
   *
   * @ORM\Column(name="first_name", type="string", length=255)
   */
  protected $firstName;

  /**
   * @var string
   *
   * @ORM\Column(name="last_name", type="string", length=255)
   */
  protected $lastName;

  /**
   * @var PhoneNumber
   *
   * @ORM\Embedded(class="AppBundle\Entity\PhoneNumber", columnPrefix="phone_")
   */
  protected $phoneNumber;

  /**
   * @var string
   *
   * @ORM\Column(name="charge_id", type="string", length=255, nullable=true)
   */
  protected $chargeId;

  public function __construct()
  {
    parent::__construct();

    $this->phoneNumber = new PhoneNumber();
  }

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

  /**
   * @param PhoneNumber $phoneNumber
   * @return $this
   */
  public function setPhoneNumber(PhoneNumber $phoneNumber = null)
  {
    $this->phoneNumber = $phoneNumber;

    return $this;
  }

  /**
   * @return PhoneNumber
   */
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }

  /**
   * @param string $chargeId
   * @return $this
   */
  public function setChargeId($chargeId)
  {
    $this->chargeId = $chargeId;

    return $this;
  }

  /**
   * @return string
   */
  public function getChargeId()
  {
    return $this->chargeId;
  }
}
