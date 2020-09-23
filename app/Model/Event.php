<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','winner_id','participant','start_date','end_date','fee',
    'prize_pool','description','rules','bracket_size','bracket_type','registration_open','registration_close',
    'form_message','admin_id','game_id'];
    public $timestamps = \true;
}
