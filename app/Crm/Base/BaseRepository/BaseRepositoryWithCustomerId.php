<?php

namespace Crm\Base\BaseRepository;

use Crm\Base\BaseResponse\BaseResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class BaseRepositoryWithCustomerId
{
    private Model $model ;
    public function setModel(Model $model)
    {
         $this->model = $model ;
    }

    public function getModel() :?Model
    {
        return $this->model;
    } 

    public function all($customerId)
    {
        return $this->model->where(["customerId"=>$customerId])->get() ;
    }


    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data , $modelId  , $customerId )
    {
        $model = $this->model->find($modelId);
        if (!$model) {
            return BaseResponse::notFoundJson('Model Not Found');
        }
        if ($model->customerId != $customerId) {
            return BaseResponse::badRequestJson('invalid customer');
        }
        $model->update($data);
        
         return $model;
           
    }

    public function delete($modelId, $customerId)
    {
        $model = $this->model->find($modelId);
        if (!$model) {
            return BaseResponse::notFoundJson('Model Not Found');
        }
        if ($model->customerId != $customerId) {
            return BaseResponse::badRequestJson('invalid customer');
        }
        $model->delete();
        return BaseResponse::deleteRequestJson();
    }


    public function show($modelId,$customerId)
    {
        $model = $this->model->find($modelId);
        if (!$model) {
            return response()->json(['status'=>'This Model is Not Found'], Response::HTTP_NOT_FOUND);
        }
        if ($customerId != $model->customerId) {
            return  response()->json(['status'=>'Invalid Customer'], Response::HTTP_BAD_REQUEST);
        }

        return $model ;
    }
     
}
