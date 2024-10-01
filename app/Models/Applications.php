<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    protected $table = 'applications';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'job_id',
        'applicant_id',
        'status',
        
    ];
    
    public function applications() {
        return $this->hasMany(Applications::class, 'job_id', 'id');
    }
}
