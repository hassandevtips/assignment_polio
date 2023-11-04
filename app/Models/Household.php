<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    protected $fillable = ['union_council_id', 'address'];

    public function unionCouncil()
    {
        return $this->belongsTo(UnionCouncil::class);
    }

    public function householdMembers()
    {
        return $this->hasMany(HouseholdMember::class);
    }
}
