<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'title', 'regis_status', 'participant', 'banner_url', 'start_date', 'end_date', 'fee',
        'prize_pool', 'description', 'rules', 'img', 'bracket_type', 'comeback', 'registration_open', 'registration_close',
        'form_message', 'admin_id', 'game_id', 'bracket_model'
    ];
    public $timestamps = \true;

    public static function getDetailedDate($date)
    {
        return Carbon::parse($date)->format('D d M Y');
    }
}
