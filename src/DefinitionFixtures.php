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

use Xabbuh\XApi\Model\Definition;
use Xabbuh\XApi\Model\Interaction\ChoiceInteractionDefinition;
use Xabbuh\XApi\Model\Interaction\FillInInteractionDefinition;
use Xabbuh\XApi\Model\Interaction\LikertInteractionDefinition;
use Xabbuh\XApi\Model\Interaction\MatchingInteractionDefinition;
use Xabbuh\XApi\Model\Interaction\NumericInteractionDefinition;
use Xabbuh\XApi\Model\Interaction\OtherInteractionDefinition;
use Xabbuh\XApi\Model\Interaction\PerformanceInteractionDefinition;
use Xabbuh\XApi\Model\Interaction\SequencingInteractionDefinition;
use Xabbuh\XApi\Model\Interaction\TrueFalseInteractionDefinition;
use Xabbuh\XApi\Model\IRI;
use Xabbuh\XApi\Model\IRL;
use Xabbuh\XApi\Model\LanguageMap;

/**
 * xAPI activity definition fixtures.
 *
 * These fixtures are borrowed from the
 * {@link https://github.com/adlnet/xAPI_LRS_Test Experience API Learning Record Store Conformance Test} package.
 */
class DefinitionFixtures
{
    public static function getEmptyDefinition(): Definition
    {
        return new Definition();
    }

    public static function getTypicalDefinition(): Definition
    {
        return new Definition();
    }

    public static function getNameDefinition(): Definition
    {
        return new Definition(LanguageMap::create(['en-US' => 'test']));
    }

    public static function getDescriptionDefinition(): Definition
    {
        return new Definition(null, LanguageMap::create(['en-US' => 'test']));
    }

    public static function getTypeDefinition(): Definition
    {
        return new Definition(null, null, IRI::fromString('http://id.tincanapi.com/activitytype/unit-test'));
    }

    public static function getMoreInfoDefinition(): Definition
    {
        return new Definition(null, null, null, IRL::fromString('https://github.com/adlnet/xAPI_LRS_Test'));
    }

    public static function getExtensionsDefinition(): Definition
    {
        return new Definition()->withExtensions(ExtensionsFixtures::getMultiplePairsExtensions());
    }

    public static function getEmptyExtensionsDefinition(): Definition
    {
        return new Definition()->withExtensions(ExtensionsFixtures::getEmptyExtensions());
    }

    public static function getAllPropertiesDefinition(): Definition
    {
        return new Definition(
            LanguageMap::create(['en-US' => 'test']),
            LanguageMap::create(['en-US' => 'test']),
            IRI::fromString('http://id.tincanapi.com/activitytype/unit-test'),
            IRL::fromString('https://github.com/adlnet/xAPI_LRS_Test'),
            ExtensionsFixtures::getTypicalExtensions()
        );
    }

    public static function getTrueFalseDefinition(): TrueFalseInteractionDefinition
    {
        return new TrueFalseInteractionDefinition();
    }

    public static function getFillInDefinition(): FillInInteractionDefinition
    {
        return new FillInInteractionDefinition();
    }

    public static function getNumericDefinition(): NumericInteractionDefinition
    {
        return new NumericInteractionDefinition();
    }

    public static function getOtherDefinition(): OtherInteractionDefinition
    {
        return new OtherInteractionDefinition();
    }

    public static function getOtherWithCorrectResponsesPatternDefinition(): OtherInteractionDefinition
    {
        return new OtherInteractionDefinition()->withCorrectResponsesPattern(['test']);
    }

    public static function getChoiceDefinition(): ChoiceInteractionDefinition
    {
        return new ChoiceInteractionDefinition()->withChoices([InteractionComponentFixtures::getTypicalInteractionComponent()]);
    }

    public static function getSequencingDefinition(): SequencingInteractionDefinition
    {
        return new SequencingInteractionDefinition()->withChoices([InteractionComponentFixtures::getTypicalInteractionComponent()]);
    }

    public static function getLikertDefinition(): LikertInteractionDefinition
    {
        return new LikertInteractionDefinition()->withScale([InteractionComponentFixtures::getTypicalInteractionComponent()]);
    }

    public static function getMatchingDefinition(): MatchingInteractionDefinition
    {
        $matchingDefinition = new MatchingInteractionDefinition();
        $matchingDefinition = $matchingDefinition->withSource([InteractionComponentFixtures::getTypicalInteractionComponent()]);

        return $matchingDefinition->withTarget([InteractionComponentFixtures::getTypicalInteractionComponent()]);
    }

    public static function getPerformanceDefinition(): PerformanceInteractionDefinition
    {
        return new PerformanceInteractionDefinition()->withSteps([InteractionComponentFixtures::getTypicalInteractionComponent()]);
    }

    public static function getForQueryDefinition(): Definition
    {
        return new Definition(LanguageMap::create(['en-US' => 'for query']));
    }
}
