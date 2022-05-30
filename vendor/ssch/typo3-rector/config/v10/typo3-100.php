<?php

declare (strict_types=1);
namespace RectorPrefix20220530;

use PHPStan\Type\ArrayType;
use PHPStan\Type\BooleanType;
use PHPStan\Type\IntegerType;
use PHPStan\Type\MixedType;
use PHPStan\Type\NullType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\StringType;
use PHPStan\Type\TypeCombinator;
use PHPStan\Type\UnionType;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Namespace_\RenameNamespaceRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector;
use Rector\Transform\ValueObject\MethodCallToStaticCall;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration;
use Ssch\TYPO3Rector\FileProcessor\TypoScript\Rector\ExtbasePersistenceTypoScriptRector;
use Ssch\TYPO3Rector\FileProcessor\Yaml\Form\Rector\EmailFinisherRector;
use Ssch\TYPO3Rector\FileProcessor\Yaml\Form\Rector\TranslationFileRector;
use Ssch\TYPO3Rector\Rector\General\ExtEmConfRector;
use Ssch\TYPO3Rector\Rector\v10\v0\BackendUtilityGetViewDomainToPageRouterRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ChangeDefaultCachingFrameworkNamesRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ConfigurationManagerAddControllerConfigurationMethodRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ForceTemplateParsingInTsfeAndTemplateServiceRector;
use Ssch\TYPO3Rector\Rector\v10\v0\RefactorIdnaEncodeMethodToNativeFunctionRector;
use Ssch\TYPO3Rector\Rector\v10\v0\RemovePropertyExtensionNameRector;
use Ssch\TYPO3Rector\Rector\v10\v0\SetSystemLocaleFromSiteLanguageRector;
use Ssch\TYPO3Rector\Rector\v10\v0\SwiftMailerBasedMailMessageToMailerBasedMessageRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseControllerClassesInExtbasePluginsAndModulesRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseMetaDataAspectRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseNativePhpHex2binMethodRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseTwoLetterIsoCodeFromSiteLanguageRector;
use Ssch\TYPO3Rector\Rector\v10\v4\RemoveFormatConstantsEmailFinisherRector;
return static function (\Rector\Config\RectorConfig $rectorConfig) : void {
    $rectorConfig->import(__DIR__ . '/../config.php');
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\RemovePropertyExtensionNameRector::class);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\UseNativePhpHex2binMethodRector::class);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\RefactorIdnaEncodeMethodToNativeFunctionRector::class);
    $rectorConfig->ruleWithConfiguration(\Rector\Renaming\Rector\Namespace_\RenameNamespaceRector::class, ['TYPO3\\CMS\\Backend\\Controller\\File' => 'TYPO3\\CMS\\Filelist\\Controller\\File']);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\UseMetaDataAspectRector::class);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\ForceTemplateParsingInTsfeAndTemplateServiceRector::class);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\BackendUtilityGetViewDomainToPageRouterRector::class);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\SetSystemLocaleFromSiteLanguageRector::class);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\ConfigurationManagerAddControllerConfigurationMethodRector::class);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v4\RemoveFormatConstantsEmailFinisherRector::class);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\UseTwoLetterIsoCodeFromSiteLanguageRector::class);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\UseControllerClassesInExtbasePluginsAndModulesRector::class);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\ChangeDefaultCachingFrameworkNamesRector::class);
    $rectorConfig->ruleWithConfiguration(\Ssch\TYPO3Rector\Rector\General\ExtEmConfRector::class, [\Ssch\TYPO3Rector\Rector\General\ExtEmConfRector::ADDITIONAL_VALUES_TO_BE_REMOVED => ['createDirs', 'uploadfolder']]);
    $rectorConfig->rule(\Ssch\TYPO3Rector\Rector\v10\v0\SwiftMailerBasedMailMessageToMailerBasedMessageRector::class);
    $rectorConfig->ruleWithConfiguration(\Ssch\TYPO3Rector\FileProcessor\TypoScript\Rector\ExtbasePersistenceTypoScriptRector::class, []);
    $rectorConfig->ruleWithConfiguration(\Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector::class, [new \Rector\Transform\ValueObject\MethodCallToStaticCall('TYPO3\\CMS\\Recordlist\\RecordList\\DatabaseRecordList', 'thumbCode', 'TYPO3\\CMS\\Backend\\Utility\\BackendUtility', 'thumbCode')]);
    $rectorConfig->ruleWithConfiguration(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class, [new \Rector\Renaming\ValueObject\MethodCallRename('TYPO3\\CMS\\Recordlist\\RecordList\\DatabaseRecordList', 'requestUri', 'listURL')]);
    $rectorConfig->rule(\Ssch\TYPO3Rector\FileProcessor\Yaml\Form\Rector\EmailFinisherRector::class);
    $rectorConfig->rule(\Ssch\TYPO3Rector\FileProcessor\Yaml\Form\Rector\TranslationFileRector::class);
    $rectorConfig->ruleWithConfiguration(\Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector::class, [new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\DomainObjectInterface', 'getUid', \PHPStan\Type\TypeCombinator::addNull(new \PHPStan\Type\IntegerType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\DomainObjectInterface', 'getPid', \PHPStan\Type\TypeCombinator::addNull(new \PHPStan\Type\IntegerType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\DomainObjectInterface', '_isNew', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\DomainObjectInterface', '_getProperties', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\AbstractDomainObject', 'getUid', \PHPStan\Type\TypeCombinator::addNull(new \PHPStan\Type\IntegerType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\AbstractDomainObject', 'getPid', \PHPStan\Type\TypeCombinator::addNull(new \PHPStan\Type\IntegerType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\DomainObject\\AbstractDomainObject', '_isNew', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Service\\ImageService', 'applyProcessingInstructions', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Core\\Resource\\ProcessedFile')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Service\\ImageService', 'getImageUri', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Service\\ImageService', 'getImage', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Core\\Resource\\FileInterface')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getSupportedSourceTypes', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getSupportedTargetType', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getTargetTypeForSource', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getPriority', new \PHPStan\Type\IntegerType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'canConvertFrom', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getSourceChildPropertiesToBeConverted', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'getTypeOfChildProperty', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface', 'convertFrom', new \PHPStan\Type\MixedType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Error\\Message', 'getMessage', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Error\\Message', 'getCode', new \PHPStan\Type\IntegerType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Error\\Message', 'getArguments', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Error\\Message', 'getTitle', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Error\\Message', 'render', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager', 'getContentObject', new \PHPStan\Type\UnionType([new \PHPStan\Type\NullType(), new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer')])), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager', 'getConfiguration', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager', 'isFeatureEnabled', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'reset', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'build', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'uriFor', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setAbsoluteUriScheme', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setAddQueryString', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setAddQueryStringMethod', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setArgumentPrefix', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setArguments', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setArgumentsToBeExcludedFromQueryString', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setCreateAbsoluteUri', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setFormat', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setLinkAccessRestrictedPages', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setNoCache', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setSection', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setTargetPageType', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setTargetPageUid', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'setUseCacheHash', new \PHPStan\Type\ObjectType('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getAddQueryString', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getAddQueryStringMethod', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getArguments', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getArgumentsToBeExcludedFromQueryString', new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\MixedType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getCreateAbsoluteUri', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getFormat', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getLinkAccessRestrictedPages', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getNoCache', new \PHPStan\Type\BooleanType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getSection', new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getTargetPageUid', \PHPStan\Type\TypeCombinator::addNull(new \PHPStan\Type\IntegerType())), new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder', 'getUseCacheHash', new \PHPStan\Type\BooleanType())]);
};
