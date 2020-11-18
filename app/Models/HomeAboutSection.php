<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class HomeAboutSection extends Model
{
    use HasFactory;
    protected $table = 'home_about_sections';
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
