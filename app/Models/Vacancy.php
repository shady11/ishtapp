<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Vacancy extends Model
{
    use SearchableTrait;

    protected $connection = 'mysql';

    protected $table = 'vacancies';

    protected $fillable = [
        'name',
        'title',
        'address',
        'description',
        'salary',
        'busyness_id',
        'schedule_id',
        'job_type_id',
        'is_disability_person_vacancy',
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

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function vacancytypes()
    {
        return VacancyType::all();
    }

    public function vacancytype()
    {
        return $this->belongsTo(VacancyType::class, 'vacancy_type_id');
    }

    public function jobtypes()
    {
        return JobType::all();
    }

    public function jobtype()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function busynesses()
    {
        return Busyness::all();
    }


    public function busyness()
    {
        return $this->belongsTo(Busyness::class, 'busyness_id');
    }

    public function schedules()
    {
        return Schedule::all();
    }


    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function regions()
    {
        return Region::all();
    }


    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
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
