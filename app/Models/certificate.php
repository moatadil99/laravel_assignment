<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    public function getnotBeforeAttribute($value)
    {
        $first = explode(' ', ($value));
        $from=explode('-', ($first[0]));
        $from = $from[0] . '-' . $from[1] . '-' . $from[2];
        return ($from);
    }
    public function getentryTimestampAttribute($value)
    {
        $first = explode(' ', ($value));
        $from=explode('-', ($first[0]));
        $from = $from[0] . '-' . $from[1] . '-' . $from[2];
        return ($from);
    }
}
