<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbandonedBicycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'manufacturer',
        'model_name',
        'frame_num',
        'color',
        'bouhan_num',
        'found_at',
        'found_location',
        'features',
        'other',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function abandonebicycles()
    {
        return $this->hasMany(AbandoneBicycle::class);
    }

    public function getPaginateByLimit(int $limit_count = 3)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);

    }
}
