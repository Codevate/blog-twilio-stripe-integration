<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Validator\Constraints as AppAssert;

/**
 * @ORM\Embeddable()
 * @AppAssert\E164Number(groups={"E164"})
 * @Assert\GroupSequence({"PhoneNumber", "E164"})
 */
class PhoneNumber
{
  const CODE_LENGTH = 6;

  /**
   * @var string
   *
   * @ORM\Column(name="number", type="string", length=16, nullable=true)
   * @Assert\NotBlank()
   */
  protected $number;

  /**
   * @var string
   *
   * @ORM\Column(name="country", type="string", length=2, nullable=true)
   * @Assert\NotBlank()
   */
  protected $country;

  /**
   * @var string
   *
   * @ORM\Column(name="verification_code", type="string", length=PhoneNumber::CODE_LENGTH, nullable=true)
   */
  protected $verificationCode;

  /**
   * @param string $number
   * @return $this
   */
  public function setNumber($number)
  {
    $this->number = $number;

    return $this;
  }

  /**
   * @return string
   */
  public function getNumber()
  {
    return $this->number;
  }

  /**
   * @param string $country
   * @return $this
   */
  public function setCountry($country)
  {
    $this->country = $country;

    return $this;
  }

  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }

  /**
   * @return $this
   */
  public function setVerificationCode()
  {
    $this->verificationCode = sprintf('%0'.self::CODE_LENGTH.'d', mt_rand(1, str_repeat(9, self::CODE_LENGTH)));

    return $this;
  }

  /**
   * @return string
   */
  public function getVerificationCode()
  {
    return $this->verificationCode;
  }
}
