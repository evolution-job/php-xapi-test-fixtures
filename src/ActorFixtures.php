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

use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\Group;
use Xabbuh\XApi\Model\InverseFunctionalIdentifier;
use Xabbuh\XApi\Model\IRI;

/**
 * xAPI actor fixtures.
 *
 * These fixtures are borrowed from the
 * {@link https://github.com/adlnet/xAPI_LRS_Test Experience API Learning Record Store Conformance Test} package.
 */
class ActorFixtures
{
    public static function getTypicalAgent(?string $name = null): Agent
    {
        return new Agent(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest@tincanapi.com')), $name);
    }

    public static function getMboxAgent(): Agent
    {
        return new Agent(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest@tincanapi.com')));
    }

    public static function getMboxSha1SumAgent(): Agent
    {
        return new Agent(InverseFunctionalIdentifier::withMboxSha1Sum('db77b9104b531ecbb0b967f6942549d0ba80fda1'));
    }

    public static function getOpenIdAgent(): Agent
    {
        return new Agent(InverseFunctionalIdentifier::withOpenId('http://openid.tincanapi.com'));
    }

    public static function getAccountAgent(): Agent
    {
        return new Agent(InverseFunctionalIdentifier::withAccount(AccountFixtures::getTypicalAccount()));
    }

    public static function getForQueryMboxAgent(): Agent
    {
        return new Agent(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest+query@tincanapi.com')));
    }

    public static function getForQueryMboxSha1SumAgent(): Agent
    {
        return new Agent(InverseFunctionalIdentifier::withMboxSha1Sum('6954e807cfbfc5b375d185de32f05de269f93d6f'));
    }

    public static function getForQueryOpenIdAgent(): Agent
    {
        return new Agent(InverseFunctionalIdentifier::withOpenId('http://openid.tincanapi.com/query'));
    }

    public static function getForQueryAccountAgent(): Agent
    {
        return new Agent(InverseFunctionalIdentifier::withAccount(AccountFixtures::getForQueryAccount()));
    }

    public static function getTypicalGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest-group@tincanapi.com')));
    }

    public static function getMboxGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest-group@tincanapi.com')));
    }

    public static function getMboxSha1SumGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMboxSha1Sum('4e271041e78101311fb37284ef1a1d35c3f1db35'));
    }

    public static function getOpenIdGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withOpenId('http://group.openid.tincanapi.com'));
    }

    public static function getAccountGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withAccount(AccountFixtures::getTypicalAccount()));
    }

    public static function getMboxAndNameGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest-group@tincanapi.com')), 'test group');
    }

    public static function getMboxSha1SumAndNameGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMboxSha1Sum('4e271041e78101311fb37284ef1a1d35c3f1db35'), 'test group');
    }

    public static function getOpenIdAndNameGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withOpenId('http://group.openid.tincanapi.com'), 'test group');
    }

    public static function getAccountAndNameGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withAccount(AccountFixtures::getTypicalAccount()), 'test group');
    }

    public static function getMboxAndMemberGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest-group@tincanapi.com')), null, [self::getTypicalAgent()]);
    }

    public static function getMboxSha1SumAndMemberGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMboxSha1Sum('4e271041e78101311fb37284ef1a1d35c3f1db35'), null, [self::getTypicalAgent()]);
    }

    public static function getOpenIdAndMemberGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withOpenId('http://group.openid.tincanapi.com'), null, [self::getTypicalAgent()]);
    }

    public static function getAccountAndMemberGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withAccount(AccountFixtures::getTypicalAccount()), null, [self::getTypicalAgent()]);
    }

    public static function getAllPropertiesAndTypicalAgentMemberGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest-group@tincanapi.com')), 'test group', [self::getTypicalAgent()]);
    }

    public static function getAllPropertiesAndMboxAgentMemberGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest-group@tincanapi.com')), 'test group', [self::getMboxAgent()]);
    }

    public static function getAllPropertiesAndMboxSha1SumAgentMemberGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest-group@tincanapi.com')), 'test group', [self::getMboxSha1SumAgent()]);
    }

    public static function getAllPropertiesAndOpenIdAgentMemberGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest-group@tincanapi.com')), 'test group', [self::getOpenIdAgent()]);
    }

    public static function getAllPropertiesAndAccountAgentMemberGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest-group@tincanapi.com')), 'test group', [self::getAccountAgent()]);
    }

    public static function getAllPropertiesAndTwoTypicalAgentMembersGroup(): Group
    {
        return new Group(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:conformancetest-group@tincanapi.com')), 'test group', [self::getTypicalAgent(), self::getTypicalAgent()]);
    }
}
