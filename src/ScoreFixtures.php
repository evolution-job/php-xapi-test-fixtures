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

use Xabbuh\XApi\Model\Score;

/**
 * xAPI score fixtures.
 *
 * These fixtures are borrowed from the
 * {@link https://github.com/adlnet/xAPI_LRS_Test Experience API Learning Record Store Conformance Test} package.
 */
class ScoreFixtures
{
    public static function getEmptyScore(): Score
    {
        return new Score();
    }

    public static function getTypicalScore(): Score
    {
        return new Score(1);
    }

    public static function getScaledScore(): Score
    {
        return new Score(1);
    }

    public static function getRawScore(): Score
    {
        return new Score(null, 100);
    }

    public static function getMinScore(): Score
    {
        return new Score(null, null, 0);
    }

    public static function getMaxScore(): Score
    {
        return new Score(null, null, null, 100);
    }

    public static function getScaledAndRawScore(): Score
    {
        return new Score(1, 100);
    }

    public static function getScaledAndMinScore(): Score
    {
        return new Score(1, null, 0);
    }

    public static function getScaledAndMaxScore(): Score
    {
        return new Score(1, null, null, 100);
    }

    public static function getRawAndMinScore(): Score
    {
        return new Score(null, 100, 0);
    }

    public static function getRawAndMaxScore(): Score
    {
        return new Score(null, 100, null, 100);
    }

    public static function getMinAndMaxScore(): Score
    {
        return new Score(null, null, 0, 100);
    }

    public static function getScaledRawAndMinScore(): Score
    {
        return new Score(1, 100, 0);
    }

    public static function getScaledRawAndMaxScore(): Score
    {
        return new Score(1, 100, null, 100);
    }

    public static function getRawMinAndMaxScore(): Score
    {
        return new Score(null, 100, 0, 100);
    }

    public static function getAllPropertiesScore(): Score
    {
        return new Score(1, 100, 0, 100);
    }
}
