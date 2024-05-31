<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Order extends Model implements HasMedia
{
    use InteractsWithMedia;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        // 'order_no',
        'design_name',
        'po_no',
        'height',
        'weight',
        'number_of_colors',
        'fabric',
        'placement',
        'required_format',
        'is_urgent',
        'instructions',
        'color_type',
        'status',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id'
    ];

    // In your User model (User.php)

    public function getFormattedCreatedAtAttribute()
    {
        return (new \DateTime($this->created_at))->format('d-M-y h:i A');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
