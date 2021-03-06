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

namespace AppBundle\Domain\Territoire\Entity\Territoire;

/**
 * Voir AppBundle\Domain\Territoire\Tests\Entity\Territoire
 * \TerritoireRepositoryTestTrait pour les contraintes à respecter lors de
 * l'implémentation de cette interface.
 */
interface TerritoireRepositoryInterface
{
    /**
     * Ajoute un territoire au repository.
     *
     * @param AbstractTerritoire $territoire Le territoire à ajouter au repo.
     */
    public function add(AbstractTerritoire $territoire);

    /**
     * Rechercher des territoires par leur nom.
     *
     * @param string $string La chaîne à rechercher dans les noms des territoires.
     * @param int    $limit  Le nombre de résultats à retourner.
     *
     * @return array Les territoires.
     */
    public function findLike($string, $limit = 10);

    /**
     * Récupérer un arrondissement communal en fonction de sa commune et de son
     * code.
     *
     * @param Commune $commune            La commune de l'arrondissement.
     * @param string  $codeArrondissement Le code de l'arrondissement
     *
     * @return ArrondissementCommunal L'arrondissement.
     */
    public function getArrondissementCommunal($commune, $codeArrondissement);

    /**
     * Récupérer une circonscription européenne.
     *
     * @param string $critere Le nom ou le code de la circonscription.
     *
     * @return CirconscriptionEuropenne La circonscription.
     */
    public function getCirconscriptionEuropeenne($critere);

    /**
     * Récupérer une circonscription législative.
     *
     * @param int $codeDepartement Le numéro du département.
     * @param int $code            Le numéro de la circo dans le département.
     *
     * @return CirconscriptionLegislative La circo.
     */
    public function getCirconscriptionLegislative($codeDepartement, $code);

    /**
     * Récupérer une commune en fonction de son code département et son code
     * commune (INSEE).
     *
     * @param int $codeDepartement Le code du département.
     * @param int $codeCommune     Le code INSEE de la commune.
     *
     * @return Commune La commune avec ces attributs.
     */
    public function getCommune($codeDepartement, $codeCommune);

    /**
     * Récupérer un département en fonction de son code.
     *
     * @param int $code Le code du département.
     *
     * @return Departement Le département avec ce code.
     */
    public function getDepartement($code);

    /**
     * Récupérer la France.
     *
     * @return Pays La France.
     */
    public function getPays();

    /**
     * Récupérer une région en fonction de son code.
     *
     * @param int $code Le code de la région.
     *
     * @return Region La région avec ce département.
     */
    public function getRegion($code);

    /**
     * Retirer un territoire donné du epository.
     *
     * @param AbstractTerritoire $territoire Le territoire à retirer.
     */
    public function remove(AbstractTerritoire $territoire);

    /**
     * Sauvegarder les changements dans le repository.
     */
    public function save();
}
