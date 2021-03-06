<?php

/*
 * Copyright 2015 Guillaume Royer
 *
 * This file is part of DataElections.
 *
 * DataElections is free software: you can redistribute it and/or modify it
 * under the terms of the GNU Affero General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.
 *
 * DataElections is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with DataElections. If not, see <http://www.gnu.org/licenses/>.
 */

namespace AppBundle\Repository;

use AppBundle\Domain\Election\Entity\Echeance\Echeance;
use AppBundle\Domain\Election\Entity\Echeance\EcheanceRepositoryInterface;

class DoctrineEcheanceRepository implements EcheanceRepositoryInterface
{
    public function __construct($doctrine)
    {
        $this->em = $doctrine->getManager();
    }

    public function add(Echeance $element)
    {
        $this->em->persist($element);
    }

    public function get(\DateTime $date, $type)
    {
        return $this
            ->em
            ->getRepository(
                '\AppBundle\Domain\Election\Entity\Echeance\Echeance'
            )
            ->findOneBy(array(
                'date' => $date,
                'type' => $type,
            ))
        ;
    }

    public function getAll()
    {
        return $this
            ->em
            ->createQuery(
                'SELECT echeance
                FROM \AppBundle\Domain\Election\Entity\Echeance\Echeance
                    echeance
                ORDER BY echeance.date ASC'
            )
            ->getResult()
        ;
    }

    /**
     * Retire l'élection du repository si elle existe.
     *
     * @param Election $element L'élection à retirer.
     */
    public function remove(Echeance $element)
    {
        $this->em->remove($element);
    }

    /**
     * Enregistrer les changements dans le repository.
     */
    public function save()
    {
        $this->em->flush();
    }
}
