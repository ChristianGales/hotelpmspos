<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    

    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    // Helper to handle the dual-model update logic
    public function syncStaffRecord(array $data) {
        return $this->staff()->updateOrCreate(
            ['user_id' => $this->id],
            [
                'name' => $data['name'],
                'is_active' => $data['is_active'] ?? true
            ]
        );
    }
    


}