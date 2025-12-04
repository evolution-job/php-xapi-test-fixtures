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

use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\ActivityProfile;
use Xabbuh\XApi\Model\ActivityProfileDocument;
use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\AgentProfile;
use Xabbuh\XApi\Model\AgentProfileDocument;
use Xabbuh\XApi\Model\DocumentData;
use Xabbuh\XApi\Model\InverseFunctionalIdentifier;
use Xabbuh\XApi\Model\IRI;
use Xabbuh\XApi\Model\State;
use Xabbuh\XApi\Model\StateDocument;

/**
 * xAPI Document fixtures.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class DocumentFixtures
{
    /**
     * Loads empty document data.
     */
    public static function getEmptyDocumentData(): DocumentData
    {
        return new DocumentData();
    }

    /**
     * Loads document data.
     */
    public static function getDocumentData(): DocumentData
    {
        return new DocumentData(['x' => 'foo', 'y' => 'bar']);
    }

    /**
     * Loads an activity profile document.
     *
     * @param DocumentData|null $documentData The document data, by default, a some
     *                                   default data will be used
     * @return ActivityProfileDocument
     */
    public static function getActivityProfileDocument(?DocumentData $documentData = null): ActivityProfileDocument
    {
        if (!$documentData instanceof DocumentData) {
            $documentData = static::getDocumentData();
        }

        $activityProfile = new ActivityProfile('profile-id', new Activity(IRI::fromString('activity-id')));

        return new ActivityProfileDocument($activityProfile, $documentData);
    }

    /**
     * Loads an agent profile document.
     *
     * @param DocumentData|null $documentData The document data, by default, a some
     *                                   default data will be used
     * @return AgentProfileDocument
     */
    public static function getAgentProfileDocument(?DocumentData $documentData = null): AgentProfileDocument
    {
        if (!$documentData instanceof DocumentData) {
            $documentData = static::getDocumentData();
        }

        return new AgentProfileDocument(new AgentProfile('profile-id', new Agent(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:christian@example.com')))), $documentData);
    }

    /**
     * Loads a state document.
     *
     * @param DocumentData|null $documentData The document data, by default, a some
     *                                   default data will be used
     * @return StateDocument
     */
    public static function getStateDocument(?DocumentData $documentData = null): StateDocument
    {
        if (!$documentData instanceof DocumentData) {
            $documentData = static::getDocumentData();
        }

        $agent = new Agent(InverseFunctionalIdentifier::withMbox(IRI::fromString('mailto:alice@example.com')));
        $activity = new Activity(IRI::fromString('activity-id'));

        return new StateDocument(new State($activity, $agent, 'state-id'), $documentData);
    }
}
