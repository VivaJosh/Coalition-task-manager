<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        //Generating UUID that will be used on url instead of IDs if not using slug
        self::creating(function ($model) {
            $model->hash_id = (string) Str::uuid();
        });
    }

    public function getRouteKeyName (): string
    {
        return 'hash_id';
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class)->orderBy('priority');
    }
}
