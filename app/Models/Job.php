<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    protected $table = 'job';
    public $timestamps = false;
    use HasFactory;

    

    protected $fillable = [
        'id',
        'foto',
        'judul',
        'deskripsi',
        'syarat',
        'nama_perusahaan',
        'lokasi',
        'gaji',
        'diposting_oleh',
    ];
    public function user():HasMany
    {
        return $this->hasMany(User::class);
    }
}
