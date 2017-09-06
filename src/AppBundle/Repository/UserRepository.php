<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class UserRepository extends EntityRepository
{
  /**
   * @return Query
   */
  public function getDuplicateVerificationCodeCountQuery()
  {
    return $this
      ->createQueryBuilder('u')
      ->select('COUNT(u.id)')
      ->andWhere('u.premium = :premium')
      ->andWhere('u.phoneNumber.verificationCode = :code')
      ->setParameter('premium', false)
      ->getQuery();
  }
}
