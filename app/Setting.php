<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $appends = ['logo_path','icon_path'];
    protected $fillable = [
        'ar_name',
        'en_name',
        'logo',
        'icon',
        'email',
        'description',
        'keywords',
        'status',
        'message_maintenance',
        'main_lang',
    ];

    public function getLogoPathAttribute()
    {
        return Storage::url('logo/' . $this->logo);
    }//end of get logo path
    
    public function getIconPathAttribute()
    {
        return Storage::url('icon/' . $this->icon);
    }//end of get icon path
}
