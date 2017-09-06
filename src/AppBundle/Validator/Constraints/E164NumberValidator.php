<?php

namespace AppBundle\Validator\Constraints;

use AppBundle\Entity\PhoneNumber;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Twilio\Exceptions\RestException;
use Twilio\Rest\Client;

class E164NumberValidator extends ConstraintValidator
{
  private $twilio;

  public function __construct(Client $twilio)
  {
    $this->twilio = $twilio;
  }

  /**
   * {@inheritdoc}
   * @param PhoneNumber $phoneNumber
   * @param E164Number $constraint
   */
  public function validate($phoneNumber, Constraint $constraint)
  {
    try {
      $number = $this->twilio->lookups
        ->phoneNumbers($phoneNumber->getNumber())
        ->fetch(['countryCode' => $phoneNumber->getCountry()]);

      $phoneNumber->setNumber($number->phoneNumber);
    } catch (RestException $e) {
      if ($e->getStatusCode() === Response::HTTP_NOT_FOUND) {
        $this->context
          ->buildViolation($constraint->invalidNumberMessage)
          ->atPath('number')
          ->addViolation();
      }
    }
  }
}
