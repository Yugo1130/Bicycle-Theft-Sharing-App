<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StolenBicycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'manufacturer',
        'model_name',
        'frame_num',
        'color',
        'bouhan_num',
        'stolen_at',
        'stolen_location',
        'features',
        'other',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stolenbicycles()
    {
        return $this->hasMany(StolenBicycle::class);
    }

    public function getPaginateByLimit(int $limit_count = 3)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);

    }
}
