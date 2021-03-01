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

    public function vacancytypes()
    {
        return VacancyType::all();
    }


    public function vacancytype($id)
    {
        return VacancyType::findOrFail($id);
    }

    public function jobtypes()
    {
        return JobType::all();
    }


    public function jobtype($id)
    {
        return JobType::findOrFail($id);
    }

    public function busynesses()
    {
        return Busyness::all();
    }


    public function busyness($id)
    {
        return Busyness::findOrFail($id);
    }

    public function schedules()
    {
        return Schedule::all();
    }


    public function schedule($id)
    {
        return Schedule::findOrFail($id);
    }

    public function regions()
    {
        return Region::all();
    }


    public function region($id)
    {
        return Region::findOrFail($id);
    }

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
