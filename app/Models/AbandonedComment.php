<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbandonedComment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 関数の名前は，外部キー（abandoned_bicycle_id）から_idを抜いたものにすると自動的に推論される．
    public function abandoned_bicycle()
    {
        return $this->belongsTo(AbandonedBicycle::class);
    }

    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit_count);
    }

    public function getUserComments(int $userId)
    {
        return $this->where('user_id', $userId)->orderby('updated_at', 'DESC')->get()->groupBy('abandoned_bicycle_id');
    }
}
