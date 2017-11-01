<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\Query;

class UserRepository extends EntityRepository
{
  /**
   * @param $chargeId
   * @return mixed
   * @throws NonUniqueResultException
   */
  public function findPremiumByChargeId($chargeId)
  {
    return $this
      ->createQueryBuilder('u')
      ->andWhere('u.premium = :premium')
      ->andWhere('u.chargeId = :chargeId')
      ->setParameters([
        'premium' => true,
        'chargeId' => $chargeId,
      ])
      ->getQuery()
      ->getOneOrNullResult();
  }
}
