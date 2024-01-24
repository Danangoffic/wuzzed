<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'parameter',
        'value',
        'status'
    ];

    // get value by group and parameter
    public static function getValueByGroupAndParameter($group, $parameter)
    {
        $db = self::getByGroupAndParameter($group, $parameter)->first();
        if($db){
            return $db->value;
        }else{
            return null;
        }
    }

    // get by group and parameter
    public static function getByGroupAndParameter($group, $parameter)
    {
        return self::where('group', $group)->where('parameter', $parameter);
    }
}
