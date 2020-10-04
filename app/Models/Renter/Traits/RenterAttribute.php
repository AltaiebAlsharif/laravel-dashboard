<?php

namespace App\Models\Renter\Traits;

/**
 * Class RenterAttribute.
 */
trait RenterAttribute
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
                '.$this->getEditButtonAttribute("edit-renter", "admin.renters.edit").'
                '.$this->getDeleteButtonAttribute("delete-renter", "admin.renters.destroy").'
                </div>';
    }
}
