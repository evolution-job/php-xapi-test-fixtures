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

use DateTime;
use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\Definition;
use Xabbuh\XApi\Model\InverseFunctionalIdentifier;
use Xabbuh\XApi\Model\IRI;
use Xabbuh\XApi\Model\LanguageMap;
use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Model\StatementId;
use Xabbuh\XApi\Model\StatementReference;
use Xabbuh\XApi\Model\SubStatement;
use Xabbuh\XApi\Model\Verb;

/**
 * xAPI statement fixtures.
 *
 * These fixtures are borrowed from the
 * {@link https://github.com/adlnet/xAPI_LRS_Test Experience API Learning Record Store Conformance Test} package.
 */
class StatementFixtures
{
    public const string DEFAULT_STATEMENT_ID = '12345678-1234-5678-8234-567812345678';

    public static function getMinimalStatement(?string $id = self::DEFAULT_STATEMENT_ID): Statement
    {
        if (null === $id) {
            $id = UuidFixtures::getUniqueUuid();
        }

        return new Statement(StatementId::fromString($id), ActorFixtures::getTypicalAgent(), VerbFixtures::getTypicalVerb(), ActivityFixtures::getTypicalActivity());
    }

    public static function getTypicalStatement($id = self::DEFAULT_STATEMENT_ID): Statement
    {
        if (null === $id) {
            $id = UuidFixtures::getUniqueUuid();
        }

        return new Statement(StatementId::fromString($id), ActorFixtures::getTypicalAgent(), VerbFixtures::getTypicalVerb(), ActivityFixtures::getTypicalActivity(), null, null, new DateTime('2014-07-23T12:34:02-05:00'));
    }

    public static function getVoidingStatement($id = null, string $voidedStatementId = 'e05aa883-acaf-40ad-bf54-02c8ce485fb0'): Statement
    {
        if (null === $id) {
            $id = UuidFixtures::getUniqueUuid();
        }

        return new Statement(StatementId::fromString($id), ActorFixtures::getTypicalAgent(), VerbFixtures::getVoidingVerb(), new StatementReference(StatementId::fromString($voidedStatementId)));
    }

    public static function getAttachmentStatement(): Statement
    {
        return new Statement(null, ActorFixtures::getTypicalAgent(), VerbFixtures::getTypicalVerb(), ActivityFixtures::getTypicalActivity(), null, null, null, null, null, [AttachmentFixtures::getTextAttachment()]);
    }

    /**
     * Loads a statement with a group as an actor.
     */
    public static function getStatementWithGroupActor(?string $id = self::DEFAULT_STATEMENT_ID): Statement
    {
        if (null === $id) {
            $id = UuidFixtures::getUniqueUuid();
        }

        $group = ActorFixtures::getTypicalGroup();
        $verb = VerbFixtures::getTypicalVerb();
        $activity = ActivityFixtures::getTypicalActivity();

        return new Statement(StatementId::fromString($id), $group, $verb, $activity);
    }

    /**
     * Loads a statement with a group that has no members as an actor.
     */
    public static function getStatementWithGroupActorWithoutMembers(?string $id = self::DEFAULT_STATEMENT_ID): Statement
    {
        if (null === $id) {
            $id = UuidFixtures::getUniqueUuid();
        }

        $group = ActorFixtures::getTypicalGroup();
        $verb = VerbFixtures::getTypicalVerb();
        $activity = ActivityFixtures::getTypicalActivity();

        return new Statement(StatementId::fromString($id), $group, $verb, $activity);
    }

    /**
     * Loads a statement including a reference to another statement.
     */
    public static function getStatementWithStatementRef(?string $id = self::DEFAULT_STATEMENT_ID): Statement
    {
        $minimalStatement = static::getMinimalStatement($id);

        return new Statement(
            $minimalStatement->getId(),
            $minimalStatement->getActor(),
            $minimalStatement->getVerb(),
            new StatementReference(StatementId::fromString('8f87ccde-bb56-4c2e-ab83-44982ef22df0'))
        );
    }

    /**
     * Loads a statement including a result.
     */
    public static function getStatementWithResult(?string $id = self::DEFAULT_STATEMENT_ID): Statement
    {
        if (null === $id) {
            $id = UuidFixtures::getUniqueUuid();
        }

        return new Statement(StatementId::fromString($id), ActorFixtures::getTypicalAgent(), VerbFixtures::getTypicalVerb(), ActivityFixtures::getTypicalActivity(), ResultFixtures::getScoreAndDurationResult());
    }

    /**
     * Loads a statement including a sub statement.
     */
    public static function getStatementWithSubStatement(?string $id = self::DEFAULT_STATEMENT_ID): Statement
    {
        if (null === $id) {
            $id = UuidFixtures::getUniqueUuid();
        }

        $actor = new Agent(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:test@example.com')));
        $verb = new Verb(IRI::fromString('http://example.com/visited'), LanguageMap::create(['en-US' => 'will visit']));
        $definition = new Definition(
            LanguageMap::create(['en-US' => 'Some Awesome Website']),
            LanguageMap::create(['en-US' => 'The visited website']),
            IRI::fromString('http://example.com/definition-type')
        );
        $activity = new Activity(IRI::fromString('http://example.com/website'), $definition);
        $subStatement = new SubStatement($actor, $verb, $activity);

        $actor = new Agent(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:test@example.com')));
        $verb = new Verb(IRI::fromString('http://example.com/planned'), LanguageMap::create(['en-US' => 'planned']));

        return new Statement(StatementId::fromString($id), $actor, $verb, $subStatement);
    }

    /**
     * Loads a statement including an agent authority.
     */
    public static function getStatementWithAgentAuthority(?string $id = self::DEFAULT_STATEMENT_ID): Statement
    {
        if (null === $id) {
            $id = UuidFixtures::getUniqueUuid();
        }

        return new Statement(StatementId::fromString($id), ActorFixtures::getTypicalAgent(), VerbFixtures::getTypicalVerb(), ActivityFixtures::getTypicalActivity(), null, ActorFixtures::getAccountAgent());
    }

    /**
     * Loads a statement including a group authority.
     */
    public static function getStatementWithGroupAuthority(?string $id = self::DEFAULT_STATEMENT_ID): Statement
    {
        if (null === $id) {
            $id = UuidFixtures::getUniqueUuid();
        }

        return new Statement(StatementId::fromString($id), ActorFixtures::getTypicalAgent(), VerbFixtures::getTypicalVerb(), ActivityFixtures::getTypicalActivity(), null, ActorFixtures::getTypicalGroup());
    }

    public static function getAllPropertiesStatement($id = self::DEFAULT_STATEMENT_ID): Statement
    {
        if (null === $id) {
            $id = UuidFixtures::getUniqueUuid();
        }

        return new Statement(
            StatementId::fromString($id),
            ActorFixtures::getTypicalAgent(),
            VerbFixtures::getTypicalVerb(),
            ActivityFixtures::getTypicalActivity(),
            ResultFixtures::getAllPropertiesResult(),
            ActorFixtures::getAccountAgent(),
            new DateTime('2013-05-18T05:32:34+00:00'),
            new DateTime('2014-07-23T12:34:02-05:00'),
            ContextFixtures::getAllPropertiesContext(),
            [AttachmentFixtures::getTextAttachment()]
        );
    }

    /**
     * @return Statement[]
     */
    public static function getStatementCollection(): array
    {
        return [
            self::getMinimalStatement('12345678-1234-5678-8234-567812345678'),
            self::getMinimalStatement('12345678-1234-5678-8234-567812345679'),
        ];
    }
}
