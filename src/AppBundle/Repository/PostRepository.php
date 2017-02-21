<?php

namespace AppBundle\Repository;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
  /**
   * @return array
   */
  public function getLatest()
  {
    return $this
      ->createQueryBuilder('p')
      ->addOrderBy('p.createdAt', Criteria::DESC)
      ->addOrderBy('p.id', Criteria::DESC)
      ->getQuery()
      ->getResult();
  }
}
