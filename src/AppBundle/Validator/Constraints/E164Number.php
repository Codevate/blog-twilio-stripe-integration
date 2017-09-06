<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class E164Number extends Constraint
{
  public $invalidNumberMessage = 'Invalid number, please check that you have entered it correctly.';

  public function getTargets()
  {
    return self::CLASS_CONSTRAINT;
  }
}
