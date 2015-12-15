<?php

/**
 * Model for table contact_us
 *
 * @author rajdeol
 */
class Contact extends Eloquent{
    //table name
    protected $table = 'contact_us';
    // we do not have created_at and updated_at in our table
    public $timestamps = false;
}
