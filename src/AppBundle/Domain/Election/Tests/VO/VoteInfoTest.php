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

namespace AppBundle\Domain\Election\Tests\VO;

use AppBundle\Domain\Election\VO\VoteInfo;

class VoteInfoTest extends \PHPUnit_Framework_TestCase
{
    public function testCanHaveInscritsAndVotantsAndExprimes()
    {
        $voteInfo = new VoteInfo(1000, 500, 250);

        $this->assertEquals(1000, $voteInfo->getInscrits());
        $this->assertEquals(500, $voteInfo->getVotants());
        $this->assertEquals(250, $voteInfo->getExprimes());
    }

    public function testExprimesLessThanVotantsLessThanInscrits()
    {
        $this->setExpectedException(
            '\InvalidArgumentException'
        );

        $voteInfo = new VoteInfo(500, 1000, 2000);
    }

    public function testExprimesLessThanVotants()
    {
        $this->setExpectedException(
            '\InvalidArgumentException'
        );

        $voteInfo = new VoteInfo(null, 1000, 2000);
    }

    public function testExprimesLessThanInscrits()
    {
        $this->setExpectedException(
            '\InvalidArgumentException'
        );

        $voteInfo = new VoteInfo(1000, null, 2000);
    }

    public function testVotantsLessThanInscrits()
    {
        $this->setExpectedException(
            '\InvalidArgumentException'
        );

        $voteInfo = new VoteInfo(1000, 2000, null);
    }
}
