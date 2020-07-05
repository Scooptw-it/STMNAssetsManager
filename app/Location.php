<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    //by default it will look for id automatically, so no need to specify here
    //by default will look for the table name in plural form, here is QUestions
    //by default it will also look for timestamp fields - created_at and updated_at

    //protected $table = 'user_questions'; in case you want to specify a different table name here
    
}
