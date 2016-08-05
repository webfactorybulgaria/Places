<?php

namespace TypiCMS\Modules\Places\Models;

use TypiCMS\Modules\Core\Custom\Models\BaseTranslation;

class PlaceTranslation extends BaseTranslation
{
    /**
     * get the parent model.
     */
    public function owner()
    {
        return $this->belongsTo('TypiCMS\Modules\Places\Custom\Models\Place', 'place_id')->withoutGlobalScopes();
    }
}
