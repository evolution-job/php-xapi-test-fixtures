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

use Xabbuh\XApi\Model\Result;

/**
 * xAPI result fixtures.
 *
 * These fixtures are borrowed from the
 * {@link https://github.com/adlnet/xAPI_LRS_Test Experience API Learning Record Store Conformance Test} package.
 */
class ResultFixtures
{
    public static function getEmptyResult(): Result
    {
        return new Result();
    }

    public static function getTypicalResult(): Result
    {
        return new Result();
    }

    public static function getScoreResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore());
    }

    public static function getEmptyScoreResult(): Result
    {
        return new Result(ScoreFixtures::getEmptyScore());
    }

    public static function getSuccessResult(): Result
    {
        return new Result(null, true);
    }

    public static function getCompletionResult(): Result
    {
        return new Result(null, null, true);
    }

    public static function getResponseResult(): Result
    {
        return new Result(null, null, null, 'test');
    }

    public static function getDurationResult(): Result
    {
        return new Result(null, null, null, null, 'PT2H');
    }

    public static function getExtensionsResult(): Result
    {
        return new Result(null, null, null, null, null, ExtensionsFixtures::getMultiplePairsExtensions());
    }

    public static function getEmptyExtensionsResult(): Result
    {
        return new Result(null, null, null, null, null, ExtensionsFixtures::getEmptyExtensions());
    }

    public static function getScoreAndSuccessResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), true);
    }

    public static function getScoreAndCompletionResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), null, true);
    }

    public static function getScoreAndResponseResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), null, null, 'test');
    }

    public static function getScoreAndDurationResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), null, null, null, 'PT2H');
    }

    public static function getSuccessAndCompletionResult(): Result
    {
        return new Result(null, true, true);
    }

    public static function getSuccessAndResponseResult(): Result
    {
        return new Result(null, true, null, 'test');
    }

    public static function getSuccessAndDurationResult(): Result
    {
        return new Result(null, true, null, null, 'PT2H');
    }

    public static function getCompletionAndResponseResult(): Result
    {
        return new Result(null, null, true, 'test');
    }

    public static function getCompletionAndDurationResult(): Result
    {
        return new Result(null, null, true, null, 'PT2H');
    }

    public static function getResponseAndDurationResult(): Result
    {
        return new Result(null, null, null, 'test', 'PT2H');
    }

    public static function getScoreSuccessAndCompletionResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), true, true);
    }

    public static function getScoreSuccessAndResponseResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), true, null, 'test');
    }

    public static function getScoreSuccessAndDurationResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), true, null, null, 'PT2H');
    }

    public static function getScoreCompletionAndResponseResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), null, true, 'test');
    }

    public static function getScoreCompletionAndDurationResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), null, true, null, 'PT2H');
    }

    public static function getScoreResponseAndDurationResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), null, null, 'test', 'PT2H');
    }

    public static function getSuccessCompletionAndResponseResult(): Result
    {
        return new Result(null, true, true, 'test');
    }

    public static function getSuccessCompletionAndDurationResult(): Result
    {
        return new Result(null, true, true, null, 'PT2H');
    }

    public static function getSuccessResponseAndDurationResult(): Result
    {
        return new Result(null, true, null, 'test', 'PT2H');
    }

    public static function getCompletionResponseAndDurationResult(): Result
    {
        return new Result(null, null, true, 'test', 'PT2H');
    }

    public static function getScoreSuccessCompletionAndResponseResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), true, true, 'test');
    }

    public static function getScoreSuccessCompletionAndDurationResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), true, true, null, 'PT2H');
    }

    public static function getSuccessCompletionResponseAndDurationResult(): Result
    {
        return new Result(null, true, true, 'test', 'PT2H');
    }

    public static function getAllPropertiesResult(): Result
    {
        return new Result(ScoreFixtures::getTypicalScore(), true, true, 'test', 'PT2H', ExtensionsFixtures::getTypicalExtensions());
    }
}
