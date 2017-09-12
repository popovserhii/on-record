<?php

namespace Popov\Hello\Model\Repository;

use Doctrine\ORM\EntityRepository;

class FirstRepository extends EntityRepository {

	protected $_alias = 'first';

	public function getFirsts() {
		$qb = $this->createQueryBuilder($this->_alias)
			->select($this->_alias);

		return $qb;
	}
}