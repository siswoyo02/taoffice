<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function User()
    {
        return $this->hasMany(User::class);
    }

}
