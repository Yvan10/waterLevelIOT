<?php

use Zephyrus\Network\RequestFactory;

/**
 * Includes any global functions needed for your project. Ideally, you should follow a more OOP approach using object
 * instead of functions, but it can become handy for defining quick function available through Pug files or any PHP
 * files. Normally used to mimic very low level operation akin to a native PHP function.
 */

/**
 * Used for list header building.
 *
 * @param string $urlData
 * @return string
 */
function href(string $urlData): string
{
    $queryArray = [];
    $paramArray = [];

    $request = RequestFactory::read();
    $href = $request->getUri()->getPath();
    $query = $request->getUri()->getQuery() ?? "";
    parse_str($query, $queryArray);
    parse_str($urlData, $paramArray);
    return "$href?" .  http_build_query(array_merge($queryArray, $paramArray));
}