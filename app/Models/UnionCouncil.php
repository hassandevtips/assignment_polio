<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnionCouncil extends Model
{
    protected $fillable = ['name', 'tehsil_id'];

    public function tehsil()
    {
        return $this->belongsTo(Tehsil::class);
    }

    public function households()
    {
        return $this->hasMany(Household::class);
    }
}
