<?php

namespace Modules\PoliPeople\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\PoliPeople\Models\PolipeopleTeam;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $id
* @property string $name
* @property string $last_name
* @property string $slug
* @property string $bio
* @property string $links
* @property string $handle
* @property string $is_published
 */
class PolipeopleMember extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'last_name',
        'slug',
        'bio',
        'links',
        'handle',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'links' => 'array',
        'teams' => 'array'
    ];

    //add has many relation with polipeople_members
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(PolipeopleTeam::class, 'polipeople_teams_members', 'member_id', 'team_id')
                    ->withPivot('position')
                    ->withTimestamps();
    }

}
