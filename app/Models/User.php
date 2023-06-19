<?php

namespace App\Models;

use MoonShine\Models\MoonshineUserRole;
use Illuminate\Notifications\Notifiable;
use MoonShine\Traits\Models\HasMoonShineChangeLog;
use MoonShine\Traits\Models\HasMoonShineSocialite;
use MoonShine\Traits\Models\HasMoonShinePermissions;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasMoonShineChangeLog;
    use HasMoonShinePermissions;
    use HasMoonShineSocialite;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'email',
        'moonshine_user_role_id',
        'password',
        'name',
        'nip',
        'avatar',
    ];

    protected $with = ['moonshineUserRole'];

    public function moonshineUserRole(): BelongsTo
    {
        return $this->belongsTo(MoonshineUserRole::class);
    }
}
