<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Note extends Model
{
    /**
     * Get the author that this book belongs to
     */
    public function rooms()
    {
        return $this->belongsTo('\App\Room');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'room_id', 'content'
    ];
    /**
     * The attributes that are excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}