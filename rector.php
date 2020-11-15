<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Set\ValueObject\SetList;
use Ssch\TYPO3Rector\Set\Typo3SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();

    // Define what rule sets will be applied
    $parameters->set(Option::SETS, [
        SetList::DEAD_CODE,
        SetList::CODING_STYLE,
        Typo3SetList::TYPO3_95,
        Typo3SetList::TYPO3_104,
    ]);

    // get services (needed for register a single rule)
    // $services = $containerConfigurator->services();

    // register a single rule
    // $services->set(TypedPropertyRector::class);

    // FQN classes are not imported by default. If you don't to do do it manually after every Rector run, enable it by:
    $parameters->set(Option::AUTO_IMPORT_NAMES, true);

    // this will not import root namespace classes, like \DateTime or \Exception
    $parameters->set(Option::IMPORT_SHORT_CLASSES, false);

    // this will not import classes used in PHP DocBlocks, like in /** @var \Some\Class */
    $parameters->set(Option::IMPORT_DOC_BLOCKS, false);

    $parameters->set(Option::PHP_VERSION_FEATURES, '7.2');

    // If you set option Option::AUTO_IMPORT_NAMES to true, you should consider excluding some TYPO3 files.
    $parameters->set(Option::EXCLUDE_PATHS, [
        'ClassAliasMap.php',
        'class.ext_update.php',
        'ext_localconf.php',
        'ext_emconf.php',
        'ext_tables.php',
        __DIR__ . '/packages/customer_sitepackage/Configuration/*'
    ]);
};
