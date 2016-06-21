<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eureka\Eureka\Index;

use Eureka\Component\Application\Application;
use Eureka\Component\Http\Server;
use Eureka\Component\Routing\RouteCollection;
use Eureka\Component\Timer\Timer;

//~ Require main config file
require_once '../config/config.php';

//~ Timer
Timer::start();

//~ Load config routing & set it
$route = RouteCollection::getInstance()->match(Server::getInstance()->getCurrentUri());

//~ Run Application
$application = new Application($route);
$application->run();
