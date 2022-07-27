<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamType extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug'];

    public function teacher(){
        return $this->hasMany(Team::class,'team_type_id');
    }
}
