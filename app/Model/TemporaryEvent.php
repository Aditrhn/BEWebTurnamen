<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TemporaryEvent extends Model
{
    protected $fillable = ['title','game_id','winner_id','participant','start_date','end_date','fee',
    'prize_pool','description','rules','bracket_type','comeback','registration_open','registration_close',
    'form_message'];
    public $timestamps = \true;
}
