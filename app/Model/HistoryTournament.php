<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HistoryTournament extends Model
{
    protected $fillable = ['game', 'name', 'team', 'date', 'participant', 'status'];
    public $timestamps = \true;
}
