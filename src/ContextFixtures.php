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

use Xabbuh\XApi\Model\Context;

/**
 * xAPI context fixtures.
 *
 * These fixtures are borrowed from the
 * {@link https://github.com/adlnet/xAPI_LRS_Test Experience API Learning Record Store Conformance Test} package.
 */
class ContextFixtures
{
    public static function getEmptyContext(): Context
    {
        return new Context();
    }

    public static function getTypicalContext(): Context
    {
        return new Context();
    }

    public static function getTypicalAgentInstructorContext(): Context
    {
        return new Context()->withInstructor(ActorFixtures::getTypicalAgent());
    }

    public static function getMboxAgentInstructorContext(): Context
    {
        return new Context()->withInstructor(ActorFixtures::getMboxAgent());
    }

    public static function getMboxSha1SumAgentInstructorContext(): Context
    {
        return new Context()->withInstructor(ActorFixtures::getMboxSha1SumAgent());
    }

    public static function getOpenIdAgentInstructorContext(): Context
    {
        return new Context()->withInstructor(ActorFixtures::getOpenIdAgent());
    }

    public static function getAccountAgentInstructorContext(): Context
    {
        return new Context()->withInstructor(ActorFixtures::getAccountAgent());
    }

    public static function getTypicalGroupTeamContext(): Context
    {
        return new Context()->withTeam(ActorFixtures::getTypicalGroup());
    }

    public static function getStatementOnlyContext(): Context
    {
        return new Context()->withStatement(StatementReferenceFixtures::getTypicalStatementReference());
    }

    public static function getExtensionsOnlyContext(): Context
    {
        return new Context()->withExtensions(ExtensionsFixtures::getTypicalExtensions());
    }

    public static function getEmptyExtensionsOnlyContext(): Context
    {
        return new Context()->withExtensions(ExtensionsFixtures::getEmptyExtensions());
    }

    public static function getEmptyContextActivitiesContext(): Context
    {
        return new Context()->withContextActivities(ContextActivitiesFixtures::getEmptyContextActivities());
    }

    public static function getEmptyContextActivitiesAllPropertiesEmptyContext(): Context
    {
        return new Context()->withContextActivities(ContextActivitiesFixtures::getAllPropertiesEmptyActivities());
    }

    public static function getContextActivitiesAllPropertiesOnlyContext(): Context
    {
        return new Context()->withContextActivities(ContextActivitiesFixtures::getAllPropertiesActivities());
    }

    public static function getAllPropertiesContext(): Context
    {
        return new Context()->withRegistration('16fd2706-8baf-433b-82eb-8c7fada847da')->withInstructor(ActorFixtures::getTypicalAgent())->withTeam(ActorFixtures::getTypicalGroup())->withContextActivities(ContextActivitiesFixtures::getAllPropertiesActivities())->withRevision('test')->withPlatform('test')->withLanguage('en-US')->withStatement(StatementReferenceFixtures::getTypicalStatementReference())->withExtensions(ExtensionsFixtures::getTypicalExtensions());
    }
}
