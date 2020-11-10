<?php

namespace App\Models\BuildingUnits\Traits;

/**
 * Class BuildingUnitAttribute.
 */
trait BuildingUnitAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-buildingunit", "admin.buildingunits.edit").'
                '.$this->getDeleteButtonAttribute("delete-buildingunit", "admin.buildingunits.destroy").'
                </div>';
    }
}
