<?php

declare (strict_types=1);
namespace RectorPrefix20220428\Doctrine\Inflector\Rules\Portuguese;

use RectorPrefix20220428\Doctrine\Inflector\GenericLanguageInflectorFactory;
use RectorPrefix20220428\Doctrine\Inflector\Rules\Ruleset;
final class InflectorFactory extends \RectorPrefix20220428\Doctrine\Inflector\GenericLanguageInflectorFactory
{
    protected function getSingularRuleset() : \RectorPrefix20220428\Doctrine\Inflector\Rules\Ruleset
    {
        return \RectorPrefix20220428\Doctrine\Inflector\Rules\Portuguese\Rules::getSingularRuleset();
    }
    protected function getPluralRuleset() : \RectorPrefix20220428\Doctrine\Inflector\Rules\Ruleset
    {
        return \RectorPrefix20220428\Doctrine\Inflector\Rules\Portuguese\Rules::getPluralRuleset();
    }
}
