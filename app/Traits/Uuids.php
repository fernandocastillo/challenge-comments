<?php
namespace App\Traits;
use Uuid;

/**
 * Trait Uuids
 * @package App\Traits
 *
 * Source: https://emymbenoun.medium.com/how-to-use-uuids-instead-of-auto-increment-ids-in-your-laravel-app-2e6cc045f6c1
 *
 */
trait Uuids
{
    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = utf8_encode(Uuid::generate());
            }
        });
    }
    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
