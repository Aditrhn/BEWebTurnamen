<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['date', 'event_id', 'round_number', 'match_number', 'team_a', 'team_b', 'score_a', 'score_b'];
    public $timestamps = \true;
}
