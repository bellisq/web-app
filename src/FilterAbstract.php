<?php

namespace Bellisq\WebApplication;

use Bellisq\Request\RequestMutable;
use Bellisq\WebApplication\Filter\FilterResultContainer;


/**
 * [Abstract Class] Filter
 *
 * @author Showsay You <akizuki.c10.l65@gmail.com>
 * @copyright 2018 Bellisq. All Rights Reserved.
 * @package bellisq/web-app
 * @since 1.0.0
 */
abstract class FilterAbstract
{
    /** @var FilterResultContainer */
    private $results;

    /**
     * FilterAbstract constructor.
     */
    public function __construct()
    {
        $this->results = new FilterResultContainer;
    }

    /**
     * Read and/or modify the request by handle() and return objects to be injected.
     *
     * @param RequestMutable $requestMutable
     * @return array
     */
    final public function filter(RequestMutable $requestMutable): array
    {
        $this->handle($requestMutable);
        return $this->results->getResultArray();
    }

    /**
     * Read and/or modify the request.
     *
     * Use addInjectionCandidate() to inject something.
     *
     * @param RequestMutable $mutableRequest
     */
    abstract protected function handle(RequestMutable $mutableRequest): void;

    /**
     * Add dependency injection candidate.
     *
     * @param object $object
     * @param null|string $className
     */
    final protected function addInjectionCandidate(object $object, ?string $className = null): void
    {
        $this->results->add($object, $className);
    }
}