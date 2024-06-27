<?php

namespace Modules\PoliPeople\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $id
* @property string $name
* @property string $slug
* @property string $description
* @property int $position
 */
class PolipeopleTeam extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'position'
    ];


    //add has many relation with polipeople_members
    public function members(): HasMany
    {
        return $this->hasMany(PolipeopleMember::class);
    }

}
