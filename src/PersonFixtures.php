<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\DataFixtures;

use Xabbuh\XApi\Model\Person;

/**
 * xAPI person fixtures.
 *
 * These fixtures are borrowed from the
 * {@link https://github.com/adlnet/xAPI_LRS_Test Experience API Learning Record Store Conformance Test} package.
 */
class PersonFixtures
{
    public static function getTypicalPerson(): Person
    {
        return Person::createFromAgents([
            ActorFixtures::getAccountAgent(),
            ActorFixtures::getMboxAgent(),
            ActorFixtures::getOpenIdAgent(),
            ActorFixtures::getTypicalAgent(),
        ]);
    }
}
