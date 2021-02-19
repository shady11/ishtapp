<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Vacancy extends Model
{
    use SearchableTrait;

    protected $connection = 'mysql';

    protected $table = 'vacancy';
    protected $fillable = [
        'name',
        'title',
        'address',
        'description',
        'salary',
        'busyness_id',
        'schedule_id',
        'job_type_id',
        'vacancy_type_id',
        'region_id',
        'company_id',
        'is_active',
    ];

    protected $searchable = [
        'columns' => [
            'id' => 10,
            'name' => 10,
        ],
    ];

    public function getCreatedDate()
    {
        return date('d-m-Y', strtotime($this->created_at));
    }

    public function getCreatedTime()
    {
        return date('H:i', strtotime($this->created_at));
    }

    //    Scopes
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
