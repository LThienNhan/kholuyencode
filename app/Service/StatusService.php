<?php 

namespace App\Service;

use Illuminate\Http\Request;
use App\Repositories\StatusRepository;
use Carbon\Carbon;

class StatusService {

    protected $statusRepository;

    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    public function getStatuses()
    {
        return $this->statusRepository->get();
    }

    public function create($params)
    {
        $params['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        return $this->statusRepository->create($params);
    }

    public function update($params)
    {
        $id = $params['id'];
        $params['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        return $this->statusRepository->update($params, $id);
    }
    
    public function delete($id)
    {
        return $this->statusRepository->delete($id);
    }

    public function findID($id)
    {
        return $this->statusRepository->findId($id);
    }
    
    public function uploadImg($params)
    {
        $id = $params['id'];
        $icon_url =$params['icon_url']->getClientOriginalName();
        $params['icon_url']->move('images/icon/',$icon_url);
        $params = ['icon_url'=>'icon/'.$icon_url];
        $params['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        return $this->statusRepository->uploadImg($params, $id);  
    }

    public function save($params)
    {
        $time =  Carbon::now('Asia/Ho_Chi_Minh');
        return $this->statusRepository->save($params, $time);
    }
}
