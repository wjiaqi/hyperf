<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Hyperf\ModelCache;

use Hyperf\Utils\Traits\StaticInstance;

class InvalidCacheManager
{
    use StaticInstance;

    /**
     * @var CacheableInterface[]
     */
    protected $models = [];

    public function push(CacheableInterface $model): void
    {
        $this->models[] = $model;
    }

    public function delete(): void
    {
        foreach ($this->models as $model) {
            $model->deleteCache();
        }
    }
}
