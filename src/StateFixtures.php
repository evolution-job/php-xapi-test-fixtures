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
use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\State;

/**
 * xAPI statement fixtures.
 *
 * These fixtures are borrowed from the
 * {@link https://github.com/adlnet/xAPI_LRS_Test Experience API Learning Record Store Conformance Test} package.
 */
class StateFixtures
{
    public const string DEFAULT_DATA = '#/lessons/azerty-123456';
    public const string DEFAULT_REGISTRATION_ID = '123456';
    public const string DEFAULT_STATE_ID = 'bookmark';

    public static function getCustomState(
        ?Activity $activity = null,
        ?Agent $agent = null,
        ?string $stateId = null,
        ?string $registrationId = null,
        mixed $data = null
    ): State {

        if (null === $activity) {
            $activity = ActivityFixtures::getTypicalActivity();
        }

        if (null === $agent) {
            $agent = ActorFixtures::getTypicalAgent();
        }

        if (null === $stateId) {
            $stateId = self::DEFAULT_STATE_ID;
        }

        if (null === $registrationId) {
            $registrationId = self::DEFAULT_REGISTRATION_ID;
        }

        if (null === $data) {
            $data = self::DEFAULT_DATA;
        }

        return new State(
            $activity,
            $agent,
            $stateId,
            $registrationId,
            $data
        );
    }

    public static function getMinimalState(?string $stateId = null): State
    {
        if (null === $stateId) {
            $stateId = self::DEFAULT_STATE_ID;
        }

        return new State(ActivityFixtures::getTypicalActivity(), ActorFixtures::getTypicalAgent(), $stateId);
    }

    public static function getTypicalState(?string $stateId = null): State
    {
        if (null === $stateId) {
            $stateId = self::DEFAULT_STATE_ID;
        }

        return new State(
            ActivityFixtures::getTypicalActivity(),
            ActorFixtures::getTypicalAgent(),
            $stateId,
            self::DEFAULT_REGISTRATION_ID,
            self::DEFAULT_DATA
        );
    }
}
