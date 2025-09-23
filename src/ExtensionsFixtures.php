<?php

namespace Xabbuh\XApi\DataFixtures;

use SplObjectStorage;
use Xabbuh\XApi\Model\Extensions;
use Xabbuh\XApi\Model\IRI;

/**
 * xAPI statement extensions fixtures.
 *
 * These fixtures are borrowed from the
 * {@link https://github.com/adlnet/xAPI_LRS_Test Experience API Learning Record Store Conformance Test} package.
 */
class ExtensionsFixtures
{
    public static function getEmptyExtensions(): Extensions
    {
        return new Extensions();
    }

    public static function getTypicalExtensions(): Extensions
    {
        $extensions = new SplObjectStorage();
        $extensions->attach(IRI::fromString('http://id.tincanapi.com/extension/topic'), 'Conformance Testing');

        return new Extensions($extensions);
    }

    public static function getWithObjectValueExtensions(): Extensions
    {
        $extensions = new SplObjectStorage();
        $extensions->attach(IRI::fromString('http://id.tincanapi.com/extension/color'), [
            'model' => 'RGB',
            'value' => '#FFFFFF',
        ]);

        return new Extensions($extensions);
    }

    public static function getWithIntegerValueExtensions(): Extensions
    {
        $extensions = new SplObjectStorage();
        $extensions->attach(IRI::fromString('http://id.tincanapi.com/extension/starting-position'), 1);

        return new Extensions($extensions);
    }

    public static function getMultiplePairsExtensions(): Extensions
    {
        $extensions = new SplObjectStorage();
        $extensions->attach(IRI::fromString('http://id.tincanapi.com/extension/topic'), 'Conformance Testing');
        $extensions->attach(IRI::fromString('http://id.tincanapi.com/extension/color'), [
            'model' => 'RGB',
            'value' => '#FFFFFF',
        ]);
        $extensions->attach(IRI::fromString('http://id.tincanapi.com/extension/starting-position'), 1);

        return new Extensions($extensions);
    }
}
