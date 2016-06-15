<?php

namespace TypiCMS\Modules\Places\Models;

use Laracasts\Presenter\PresentableTrait;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Traits\Translatable;
use TypiCMS\Modules\History\Traits\Historable;

class Place extends Base
{
    use Historable;
    use Translatable;
    use PresentableTrait;

    protected $presenter = 'TypiCMS\Modules\Places\Presenters\ModulePresenter';

    protected $fillable = [
        'address',
        'email',
        'phone',
        'fax',
        'website',
        'image',
        'latitude',
        'longitude',
        // Translatable columns
        'title',
        'slug',
        'summary',
        'body',
        'status',
    ];

    /**
     * Translatable model configs.
     *
     * @var array
     */
    public $translatedAttributes = [
        'title',
        'slug',
        'summary',
        'body',
        'status',
    ];

    protected $appends = ['thumb'];

    /**
     * Append thumb attribute.
     *
     * @return string
     */
    public function getThumbAttribute()
    {
        return $this->present()->thumbSrc(null, 22);
    }
}
