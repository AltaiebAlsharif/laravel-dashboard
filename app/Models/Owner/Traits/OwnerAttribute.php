<?php

namespace App\Models\Owner\Traits;

/**
 * Class OwnerAttribute.
 */
trait OwnerAttribute
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
                '.$this->getEditButtonAttribute("edit-owner", "admin.owners.edit").'
                '.$this->getDeleteButtonAttribute("delete-owner", "admin.owners.destroy").'
                </div>';
    }
}
