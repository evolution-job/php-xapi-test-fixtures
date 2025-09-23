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
    public const array DEFAULT_DATA = ['progress' => 0.5];
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

        return new State(
            $activity,
            $agent,
            $stateId,
            $registrationId,
            $data
        );
    }

    public static function getMinimalState(): State
    {
        return new State(
            ActivityFixtures::getTypicalActivity(),
            ActorFixtures::getTypicalAgent(),
            self::DEFAULT_STATE_ID,
            null,
            self::DEFAULT_DATA
        );
    }

    public static function getTypicalState(): State
    {
        return new State(
            ActivityFixtures::getTypicalActivity(),
            ActorFixtures::getTypicalAgent('Test User'),
            self::DEFAULT_STATE_ID,
            self::DEFAULT_REGISTRATION_ID,
            [
                'progress'     => 0.75,
                'bookmark'     => [
                    'page'    => 15,
                    'section' => 'chapter-3',
                ],
                'preferences'  => [
                    'language' => 'en-US',
                    'volume'   => 0.8,
                ],
                'lastAccessed' => '2013-05-18T05:32:34+00:00'
            ]
        );
    }

    public static function getAllPropertiesState(): State
    {
        return new State(
            ActivityFixtures::getTypicalActivity(),
            ActorFixtures::getTypicalAgent('Test Learner'),
            self::DEFAULT_STATE_ID,
            self::DEFAULT_REGISTRATION_ID . '-all',
            [
                'bookmark' => [
                    'page'         => 15,
                    'section'      => 'chapter-3',
                    'lastAccessed' => '2023-11-20T14:22:33Z',
                    'progress'     => 0.75,
                    'notes'        => [
                        [
                            'id'        => 'note-1',
                            'text'      => 'Important concept to remember',
                            'timestamp' => '2023-11-20T14:15:00Z'
                        ],
                        [
                            'id'        => 'note-2',
                            'text'      => 'Follow up on this topic',
                            'timestamp' => '2023-11-20T14:20:15Z'
                        ]
                    ],
                    'preferences'  => [
                        'fontSize'      => 'medium',
                        'theme'         => 'light',
                        'autoSave'      => true,
                        'notifications' => [
                            'email' => true,
                            'push'  => false
                        ]
                    ],
                    'metadata'     => [
                        'version'      => '1.2.0',
                        'lastModified' => '2023-11-20T14:22:33Z',
                        'checksum'     => 'a1b2c3d4e5f6789012345678901234567890abcd',
                        'contentType'  => 'application/json',
                        'size'         => 1024
                    ],
                    'extensions'   => [
                        'http://example.com/extension/device-info'   => [
                            'platform'         => 'web',
                            'browser'          => 'Chrome',
                            'version'          => '119.0.0.0',
                            'screenResolution' => '1920x1080'
                        ],
                        'http://example.com/extension/learning-path' => [
                            'pathId'                 => 'beginner-course',
                            'completedSteps'         => 12,
                            'totalSteps'             => 20,
                            'estimatedTimeRemaining' => 'PT2H30M'
                        ]
                    ]
                ]
            ]
        );
    }
}
