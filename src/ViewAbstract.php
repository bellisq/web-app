<?php

namespace Bellisq\WebApplication;


/**
 * [Abstract Class] View
 *
 * @author Showsay You <akizuki.c10.l65@gmail.com>
 * @copyright 2018 Bellisq. All Rights Reserved.
 * @package bellisq/web-app
 * @since 1.0.0
 */
abstract class ViewAbstract
{
    /**
     * Dispatch HTTP headers and body.
     *
     * Careful: some of HTTP headers may be already sent in the controller.
     */
    abstract public function dispatch(): void;
}