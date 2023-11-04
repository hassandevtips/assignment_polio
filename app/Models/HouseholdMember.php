<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseholdMember extends Model
{
    protected $fillable = ['household_id', 'name', 'age', 'gender', 'vaccination_status'];

    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
