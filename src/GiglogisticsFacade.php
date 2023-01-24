<?php

namespace Skima\Giglogistics;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Skima\Giglogistics\Skeleton\SkeletonClass
 */
class GiglogisticsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'giglogistics';
    }
}
