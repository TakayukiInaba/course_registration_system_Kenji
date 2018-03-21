<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    //
    protected $dates = ['st_day','lat_day'];
    
    public function scopeGetFmOpt($query)
    {
        foreach($this as $item){
            $options = [
                $item->id => $item->value,
            ];
        }
        return $options;
    }
}
