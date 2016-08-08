<?php

namespace TypiCMS\Modules\Places\Models;

use TypiCMS\Modules\Core\Shells\Models\BaseTranslation;

class PlaceTranslation extends BaseTranslation
{
    /**
     * get the parent model.
     */
    public function owner()
    {
        return $this->belongsTo('TypiCMS\Modules\Places\Shells\Models\Place', 'place_id')->withoutGlobalScopes();
    }
}
