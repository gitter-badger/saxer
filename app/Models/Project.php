<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Project extends Model
{
    protected $fillable = [
        'name', 'description', 'domain', 'rwd_template', 'enabled', 'master_id', 'owner_id'
    ];

    public static function hostToProject($host)
    {
        try {
            Config::set('custom.project', static::where([['domain', $host],
                ['enabled', true]])->first());
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
