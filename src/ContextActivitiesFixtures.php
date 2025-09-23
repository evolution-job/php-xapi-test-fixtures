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

use Xabbuh\XApi\Model\ContextActivities;

/**
 * xAPI context activities fixtures.
 *
 * These fixtures are borrowed from the
 * {@link https://github.com/adlnet/xAPI_LRS_Test Experience API Learning Record Store Conformance Test} package.
 */
class ContextActivitiesFixtures
{
    public static function getEmptyContextActivities(): ContextActivities
    {
        return new ContextActivities();
    }

    public static function getTypicalContextActivities(): ContextActivities
    {
        return new ContextActivities();
    }

    public static function getCategoryOnlyContextActivities(): ContextActivities
    {
        return new ContextActivities()->withAddedCategoryActivity(ActivityFixtures::getTypicalActivity());
    }

    public static function getParentOnlyContextActivities(): ContextActivities
    {
        return new ContextActivities()->withAddedParentActivity(ActivityFixtures::getTypicalActivity());
    }

    public static function getGroupingOnlyContextActivities(): ContextActivities
    {
        return new ContextActivities()->withAddedGroupingActivity(ActivityFixtures::getTypicalActivity());
    }

    public static function getOtherOnlyContextActivities(): ContextActivities
    {
        return new ContextActivities()->withAddedOtherActivity(ActivityFixtures::getTypicalActivity());
    }

    public static function getAllPropertiesEmptyActivities(): ContextActivities
    {
        return new ContextActivities([], [], [], []);
    }

    public static function getAllPropertiesActivities(): ContextActivities
    {
        return new ContextActivities(
            [ActivityFixtures::getTypicalActivity()],
            [ActivityFixtures::getTypicalActivity()],
            [ActivityFixtures::getTypicalActivity()],
            [ActivityFixtures::getTypicalActivity()]
        );
    }
}
