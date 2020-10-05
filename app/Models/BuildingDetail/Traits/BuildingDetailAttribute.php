<?php

namespace App\Models\BuildingDetail\Traits;

/**
 * Class BuildingDetailAttribute.
 */
trait BuildingDetailAttribute
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
                '.$this->getEditButtonAttribute("edit-buildingdetail", "admin.buildingdetails.edit").'
                '.$this->getDeleteButtonAttribute("delete-buildingdetail", "admin.buildingdetails.destroy").'
                </div>';
    }
}
