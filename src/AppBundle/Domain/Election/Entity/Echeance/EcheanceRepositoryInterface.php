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

namespace AppBundle\Domain\Election\Entity\Echeance;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Voir AppBundle\Domain\Election\Tests\Entity\Echeance
 * \EcheanceRepositoryTestTrait pour les contraintes que à respecter en
 * implémentant cette interface.
 */
interface EcheanceRepositoryInterface
{
    /**
     * Ajouter une échéance au dépot.
     *
     * @param Echeance $echeance L'échéance à ajouter au dépot.
     */
    public function add(Echeance $echeance);

    /**
     * Récupérer une échéance par son nom.
     *
     * @param string $date La date de l'échéance.
     * @param int    $type Le type de l'échéance.
     *
     * @return Echeance L'échéance portant ce nom.
     */
    public function get(\DateTime $date, $type);

    /**
     * Récupérer toutes les échéances connues.
     *
     * @return ArrayCollection Toutes les échéances connues.
     */
    public function getAll();

    /**
     * Retire l'élection du repository si elle existe.
     *
     * @param Election $element L'élection à retirer.
     */
    public function remove(Echeance $element);

    /**
     * Enregistrer les changements dans le repository.
     */
    public function save();
}
