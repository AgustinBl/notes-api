<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Room extends Model
{
   
    public function rooms()
    {
        return $this->hasMany('\App\Note');
    }
    
    protected $fillable = [
        'name'
    ];
    /**
     * The attributes that are excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}