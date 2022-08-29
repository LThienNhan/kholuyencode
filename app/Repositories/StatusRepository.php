<?php

namespace App\Repositories;

use DB;

class StatusRepository
{
    protected $statusDB;  

    public function __construct()
    {
        return $this->statusDB= DB::connection('mysql2')->table('lesson_statuses');
    }

    public function get()
    {
        return $this->statusDB->orderBy('order_index', 'asc')->get();
    }
  
    public function create($params)
    {
        return $this->statusDB->insert($params);
    }
    
    public function findId($id)
    {
        return $this->statusDB->select()->where('id',$id)->get();
    }

    public function update($params, $id)
    {
        return $this->statusDB->where('id',$id)->update($params);
    }

    public function delete($id)
    {
        return $this->statusDB->where('id',$id)->delete();
    }

    public function uploadImg($params, $id)
    {
        return $this->statusDB->where('id',$id)->update($params);
    }

    public function save($params, $time)
    {
       foreach ($params['order_index'] as $key => $value)
       {
         DB::connection('mysql2')->table('lesson_statuses')->where('id',$key)->update(['order_index'=>$value]);
       } 
       return true;
    }

   
}
