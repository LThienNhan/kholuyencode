<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\StatusService;
use App\Http\Requests\StoreStatusFormRequest;
use App\Http\Controllers\BaseController;
use App\Traits\UploadAble;

class StatusesController extends BaseController
{
    use UploadAble;
    protected $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    public function index()
    {
    $statuses = $this->statusService->getStatuses();
    return view('admin.statuses.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.statuses.create');
    }

    public function store(StoreStatusFormRequest $request)
    {
        $params = $request->except('_token');
        $status = $this->statusService->create($params);
        if (!$status) {
            return $this->responseRedirectBack('Error occurred while creating status.', 'error', true, true);
        }
        return $this->responseRedirect('admin.statuses.index', 'Status added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $statuses = $this->statusService->findID($id);
        return view('admin.statuses.edit', compact('statuses'));
    }

    public function update(StoreStatusFormRequest $request)
    {
        $params = $request->except('_token');
        $status = $this->statusService->update($params);
        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating Status.', 'error', true, true);
        }
        return $this->responseRedirect('admin.statuses.index', 'Status updated successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $status = $this->statusService->delete($id);
        if (!$status) {
            return $this->responseRedirectBack('Error occurred while deleting Status.', 'error', true, true);
        }
        return $this->responseRedirect('admin.statuses.index', 'Status deleted successfully' ,'success',false, false);
    }

    public function upload(Request $request)
    {
        $params = $request->except('_token');
        $status = $this->statusService->uploadImg($params);
        if (!$status) {
            return $this->responseRedirectBack('Photo update failed.', 'error', true, true);
        }
        return $this->responseRedirect('admin.statuses.index', 'Photo update successful' ,'success',false, false);
    }

    public function save(Request $request)
    {
        $params = $request->except('_token');
        $statuses = $this->statusService->save($params);
        if (!$statuses) {
            return $this->responseRedirectBack('Photo update failed.', 'error', true, true);
        }
        return $this->responseRedirect('admin.statuses.index', 'Photo update successful' ,'success',false, false);
    }
      

}
