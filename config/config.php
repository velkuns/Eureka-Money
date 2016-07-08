<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eureka\Eureka\Config;

use Eureka\Component\Cache\CacheFactory;
use Eureka\Component\Config\Config;
use Eureka\Component\Template\Template;
use Eureka\Component\Yaml\Yaml;

session_start();

//~ Define
define('EKA_ENV', 'dev');

define('EKA_ROOT',      realpath(__DIR__ . '/..'));
define('EKA_PACKAGE',   EKA_ROOT . '/vendor/eureka');
define('EKA_COMPONENT', EKA_ROOT . '/vendor/eureka');
define('EKA_CONFIG',    EKA_ROOT . '/config');
define('EKA_EUREKON',   'eurekon.phar');

if (!defined('EKA_SEP')) {
    define('EKA_SEP',       DIRECTORY_SEPARATOR);
}

//~ Display errors
if (EKA_ENV === 'prod') {
    error_reporting(-1);
    ini_set('display_errors', false);
} else {
    error_reporting(-1);
    ini_set('display_errors', true);
}

//~ Define Loader & add main classes for config
/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require_once __DIR__ . '/../vendor/autoload.php';
$loader->addPsr4('Eureka\Eurekon\\', 'phar://eurekon.phar');

//~ Cache
if (EKA_ENV === 'prod') {
    $cache = CacheFactory::build();
    $cache->setDirectory(EKA_ROOT . '/.cache/cache');
} else {
    $cache = null;
}

//~ Load Loader config & set it
$config = Config::getInstance();
$config->setCache($cache);

Template::setPathCompiled(EKA_ROOT . '/.cache/tpl');
Template::setForceCompilation((EKA_ENV !== 'prod'));

//~ Load theme
$config->load(EKA_CONFIG . '/theme.yml', 'Eureka\Global\Theme', new Yaml(), EKA_ENV);

//~ Load meta
$config->load(EKA_CONFIG . '/meta.yml', 'Eureka\Global\Meta', new Yaml(), EKA_ENV);

//~ Helper file
require_once EKA_CONFIG . '/helper.php';

//~ Other configs files
if (PHP_SAPI === 'cli') {
    //~ Require package only for cli
    require_once EKA_PACKAGE . '/package-user/config/config.php';
    require_once EKA_PACKAGE . '/package-money/config/config.php';
} else {
    //~ Require package only for web
    require_once EKA_PACKAGE . '/package-adminlte/config/config.php';
    require_once EKA_PACKAGE . '/package-user/config/config.php';
    require_once EKA_PACKAGE . '/package-money/config/config.php';
}
