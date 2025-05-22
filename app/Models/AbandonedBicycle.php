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
        'prefecture',
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

    public function abandonedcomments()
    {
        return $this->hasMany(AbandonedComment::class);
    }    

    public function getPaginateByLimit(int $limit_count = 20)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function getFiltered($inputs, int $limit_count = 20)
    {
        $query = $this->newQuery();

        if (!empty($inputs['model'])) {
            $query->where('model', 'like', $inputs['model']);
        }

        if (!empty($inputs['manufacturer'])) {
            $query->where('manufacturer', 'like', '%' . $inputs['manufacturer'] . '%');
        }

        if (!empty($inputs['frame_num'])) {
            $query->where('frame_num', 'like', '%' . $inputs['frame_num'] . '%');
        }

        if (!empty($inputs['bouhan_num'])) {
            $query->where('bouhan_num', 'like', '%' . $inputs['bouhan_num'] . '%');
        }

        return $query->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function getUserPost(int $userId)
    {
        return $this->where('user_id', $userId)->orderby('updated_at', 'DESC')->get();
    }
}
