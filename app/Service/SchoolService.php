<?php 

namespace App\Service;

use Illuminate\Http\Request;
use App\Repositories\SchoolRepository;

class SchoolService {

    protected $schoolRepository;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function getShools()
    {
  
        return $this->schoolRepository->getShools();
    }

    public function countKids()
    {
  
        return $this->schoolRepository->getKids();
    }

    public function countClass()
    {
  
        return $this->schoolRepository->getClass();
    }

    public function countTeacher()
    {
  
        return $this->schoolRepository->getTeacher();
    }

    public function countParent()
    {
  
        return $this->schoolRepository->getParent();
    }

    public function countLesson()
    {
  
        return $this->schoolRepository->getLesson();
    }

    public function countImg()
    {
  
        return $this->schoolRepository->getImg();
    }

    public function countVideo()
    {
  
        return $this->schoolRepository->getVideo();
    }

    public function countActivite()
    {
  
        return $this->schoolRepository->getActivite();
    }

}
