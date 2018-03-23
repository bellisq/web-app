<?php

namespace Bellisq\WebApplication\Filter;


/**
 * [Class] Filter Result Container
 *
 * @author Showsay You <akizuki.c10.l65@gmail.com>
 * @copyright 2018 Bellisq. All Rights Reserved.
 * @package bellisq/web-app
 * @since 1.0.0
 *
 * @internal
 */
class FilterResultContainer
{
    private $results = [];

    public function add(object $object, ?string $class = null): self
    {
        if (is_null($class)) $this->results[] = $object;
        else $this->results[] = [$object, $class];
        return $this;
    }

    public function getResultArray(): array
    {
        return $this->results;
    }
}