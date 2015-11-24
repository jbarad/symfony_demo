<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CurrencyRepository extends EntityRepository
{
	public function calculate ($amount, $currencyOld, $currencyNew, $ceil = true) {
		$currencyOldTable = $this->findOneByCode($currencyOld);
		$currencyNewTable = $this->findOneByCode($currencyNew);

		if($currencyOldTable->getConversion() != 0 && $amount != 0){
			$val = (($currencyNewTable->getConversion()/$currencyOldTable->getConversion())*$amount);
			return $ceil ? round($val, 0, PHP_ROUND_HALF_DOWN) : $val;
		}else{
			return 0;
		}
	}
}
