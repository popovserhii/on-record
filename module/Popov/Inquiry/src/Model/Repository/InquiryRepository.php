<?php

namespace Popov\Inquiry\Model\Repository;

//use Magere\Agere\ORM\EntityRepository;
use Doctrine\ORM\EntityRepository;

class InquiryRepository extends EntityRepository {

	protected $_alias = 'inquiry';

	public function getInquiries() {
		#$userAlias = 'user';

		$qb = $this->createQueryBuilder($this->_alias)
			->select($this->_alias)
			#->leftJoin($this->_alias . '.createdBy', $userAlias)
		;

		/*->leftJoin(
			'Agere\Spare\Model\ProductCity',
			$productCityAlias,
			'WITH',
			$productCityAlias . '.city = invoiceProduct.city AND productCity.product = invoiceProduct.product'
		)*/

		//$query = $qb->getQuery();
		//\Zend\Debug\Debug::dump($query->getSql()); die(__METHOD__);


		/**
		$cartAlias = 'c';
		$statusAlias = 's';
		$handbookAlias = 'h';
		$usersAlias = 'u';

		$usersCityAlias = 'uc';
		$cityAlias = 't'; // from 'town'

		$qb = $this->createQueryBuilder($this->_alias);
		$qb
		->addSelect($cartAlias)
		->innerJoin($this->_alias . '.cart', $cartAlias)

		->addSelect($usersAlias)
		->innerJoin($cartAlias . '.users', $usersAlias)

		->addSelect($statusAlias)
		->innerJoin($this->_alias . '.status', $statusAlias)

		->addSelect($handbookAlias)
		->leftJoin($this->_alias . '.handbook', $handbookAlias)

		// new code
		->addSelect($usersCityAlias)
		->leftJoin($usersAlias . '.usersCity', $usersCityAlias)

		->addSelect($cityAlias)
		->leftJoin($usersCityAlias . '.city', $cityAlias)
		// !new code
		;

		 */

		return $qb;
	}
}