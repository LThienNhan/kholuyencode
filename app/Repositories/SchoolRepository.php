<?php

namespace App\Repositories;

use App\Models\School;
use DB;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class SchoolRepository extends BaseRepository
{
   
    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(School $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getShools()
    {
        return School::select()->get();
    }

    public function getKids()
    {
        return DB::connection('mysql2')->table('kids')->select()->get()->count();
    }

    public function getClass()
    {
        return DB::connection('mysql2')->table('classes')->count();
    }
    
    public function getTeacher()
    {
        return DB::connection('mysql2')->table('parent_kids')->select()->get()->count();
    }

    public function getParent()
    {
        return DB::connection('mysql2')->table('parent_kids')->select()->get()->count();
    }
    
    public function getLesson()
    {
        return DB::connection('mysql2')->table('lessons')->select()->get()->count();
    }

    public function getImg()
    {
        return DB::connection('mysql2')->table('medias')->select('type')->get()->where('type','picture')->count();
    }

    public function getVideo()
    {
        return DB::connection('mysql2')->table('medias')->select('type')->get()->where('type','video')->count();
    }

    public function getActivite()
    {
        return DB::connection('mysql2')->table('activities')->select()->get()->count();
    }

  
}
