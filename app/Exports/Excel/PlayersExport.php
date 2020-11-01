<?php

namespace App\Exports\Excel;

use App\Model\Player;
use Maatwebsite\Excel\Concerns\FromCollection;

class PlayersExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $player = Player::select('id', 'name', 'email', 'contact', 'city')->get();
        return $player;
    }
}
