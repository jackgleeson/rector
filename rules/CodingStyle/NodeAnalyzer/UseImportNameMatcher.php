<?php

declare (strict_types=1);
namespace Rector\CodingStyle\NodeAnalyzer;

use RectorPrefix20220530\Nette\Utils\Strings;
use PhpParser\Node\Stmt;
use PhpParser\Node\Stmt\GroupUse;
use PhpParser\Node\Stmt\Use_;
use PhpParser\Node\Stmt\UseUse;
use Rector\Core\PhpParser\Node\BetterNodeFinder;
use Rector\Core\Util\StringUtils;
final class UseImportNameMatcher
{
    /**
     * @var string
     *
     * @see https://regex101.com/r/ZxFSlc/1 for last name, eg: Entity and UniqueEntity
     * @see https://regex101.com/r/OLO0Un/1 for inside namespace, eg: ORM for ORM\Id or ORM\Column
     */
    private const SHORT_NAME_REGEX = '#^%s(\\\\[\\w]+)?$#i';
    /**
     * @readonly
     * @var \Rector\Core\PhpParser\Node\BetterNodeFinder
     */
    private $betterNodeFinder;
    public function __construct(\Rector\Core\PhpParser\Node\BetterNodeFinder $betterNodeFinder)
    {
        $this->betterNodeFinder = $betterNodeFinder;
    }
    /**
     * @param Stmt[] $stmts
     */
    public function matchNameWithStmts(string $tag, array $stmts) : ?string
    {
        /** @var Use_[] $uses */
        $uses = $this->betterNodeFinder->findInstanceOf($stmts, \PhpParser\Node\Stmt\Use_::class);
        return $this->matchNameWithUses($tag, $uses);
    }
    /**
     * @param Use_[]|GroupUse[] $uses
     */
    public function matchNameWithUses(string $tag, array $uses) : ?string
    {
        foreach ($uses as $use) {
            $prefix = $use instanceof \PhpParser\Node\Stmt\GroupUse ? $use->prefix . '\\' : '';
            foreach ($use->uses as $useUse) {
                if (!$this->isUseMatchingName($tag, $useUse)) {
                    continue;
                }
                return $this->resolveName($prefix, $tag, $useUse);
            }
        }
        return null;
    }
    public function resolveName(string $prefix, string $tag, \PhpParser\Node\Stmt\UseUse $useUse) : string
    {
        if ($useUse->alias === null) {
            return $prefix . $useUse->name->toString();
        }
        $unaliasedShortClass = \RectorPrefix20220530\Nette\Utils\Strings::substring($tag, \RectorPrefix20220530\Nette\Utils\Strings::length($useUse->alias->toString()));
        if (\strncmp($unaliasedShortClass, '\\', \strlen('\\')) === 0) {
            return $prefix . $useUse->name . $unaliasedShortClass;
        }
        return $prefix . $useUse->name . '\\' . $unaliasedShortClass;
    }
    private function isUseMatchingName(string $tag, \PhpParser\Node\Stmt\UseUse $useUse) : bool
    {
        $shortName = $useUse->alias !== null ? $useUse->alias->name : $useUse->name->getLast();
        $shortNamePattern = \preg_quote($shortName, '#');
        $pattern = \sprintf(self::SHORT_NAME_REGEX, $shortNamePattern);
        return \Rector\Core\Util\StringUtils::isMatch($tag, $pattern);
    }
}
