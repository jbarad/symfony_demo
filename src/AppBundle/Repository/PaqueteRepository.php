<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for paquete paquete information.
 * See http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class PaqueteRepository extends EntityRepository
{
    public function queryAll()
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT p
                FROM AppBundle:Paquete p
                ORDER BY p.validoHasta DESC
            ');
    }

    public function getPaquetesCercanos($idPaquete)
    {
        $query = $this->getEntityManager()
            ->createQuery('
				SELECT DISTINCT
					p.id, p.titulo, f.precio, p.moneda
				FROM
					AppBundle:Paquete p
						LEFT JOIN p.fechas f
				WHERE
					p.id <> :idPaquete
					and p.activado = 1
					and f.fecha >= CURRENT_TIMESTAMP()
					and f.stock > 0
					and f.precio = (
						SELECT
							MIN(f2.precio) 
						FROM
							AppBundle:Fecha f2 
						WHERE f2.paquete = p
					)')
            	->setParameters(array(
            		'idPaquete' => $idPaquete,
            	))
            	->setMaxResults(4);

        $fechas = $query->execute();

		$res = array();
		foreach ($fechas as $fecha){
			$fecha = $this->convertPrice($fecha, $fecha["moneda"], "ARS");
			$res[] = $fecha;
		}

        return $res;
    }

	private function convertPrice($fecha, $oldCurrency = "USD", $newCurrency = "ARS"){
		$em = $this->getEntityManager();
		$repoCurrency = $em->getRepository('AppBundle:Currency');

		if(isset($fecha["precio"])){
			$fecha["precio"] = $repoCurrency->calculate($fecha["precio"], $oldCurrency, $newCurrency);
		}

		if(isset($fecha["afip"])){
			$fecha["afip"] = $repoCurrency->calculate($fecha["afip"], $oldCurrency, $newCurrency);
		}

		return $fecha;
	}
}
