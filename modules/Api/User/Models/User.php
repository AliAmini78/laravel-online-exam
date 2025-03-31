<?php

namespace Api\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Api\User\Database\Factories\UserFactory;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        "birthday",
        "type",
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * @return UserFactory
     */
    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    public function scopeFilter(\Illuminate\Database\Eloquent\Builder $builder, Request $request)
    {
        return $builder
            ->when($request->get("name"), function ($query, $name) {
                $query->where('name', "like", "%{$name}%");
            })
            ->when($request->get("email"), function ($query, $email) {
                $query->where("email", "like", "%{$email}%");
            })
            ->when($request->get("type"), function ($query, $type) {
                $query->where("type", $type);
            })
            ->when($request->get("birthday_start"), function ($query, $birthday) {
                $query->where("birthday", ">=", $birthday);
            })
            ->when($request->get("birthday_end"), function ($query, $birthday) {
                $query->where("birthday", "<=", $birthday);
            })->when(!empty($request->get("sort")),
                function ($query, $sort) {
                    foreach ($sort as $column => $order)
                        $query->orderBy($column, $order);
                },
                function ($query) {
                    $query->orderBy('id', "desc");
                });
    }

//    /**
//     * @return HasMany
//     */
//    public function lectures(): HasMany
//    {
//       return $this->hasMany(Lecture::class , "teacher_id" , "id");
//    }

}
