<?php

namespace Mailery\Common\Entity;

interface RoutableEntityInterface
{
    /**
     * @return string
     */
    public function getViewRouteName(): string;

    /**
     * @return array
     */
    public function getViewRouteParams(): array;

    /**
     * @return string
     */
    public function getEditRouteName(): string;

    /**
     * @return array
     */
    public function getEditRouteParams(): array;
}
