<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerCommandsType extends Model
{
    protected $table = 'vger_commands_type';
    
    public function getDates() {
        return array();
    }
}
