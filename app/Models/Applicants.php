<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Applicants extends Model
{
  
    protected $table = 'applicants';
    public $timestamps = false;
    use HasFactory;

    

    protected $fillable = [
        'user_id',
        'cv',
        'ktp',
        'ijasah',
        'tanggal_lahir',
        'alamat',
        'telepon',
    ];
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
