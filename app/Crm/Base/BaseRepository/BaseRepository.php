<?php

namespace Crm\Base\BaseRepository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class BaseRepository
{
    private Model $model ;

    public function setModel(Model $model)
    {
        return $this->model = $model ;
    }

    public function getModel()
    {
        return $this->model;
    }

     public function all()
     {
         return $this->model->all();
     }


     public function create(array $data)
     {
         return $this->model->create($data);
     }

     public function update(array $data, $id)
     {
         $model = $this->model->find($id ?? 0);
         if (!$model) {
             return response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
         }
         $model->update($data) ;
         return $model ;
     }

     public function delete($id)        
     {
         $model = $this->model->find($id);
         if (!$model) {
             return response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
         }

         $model->delete();
         return response()->json(['status'=>'Deleted'], Response::HTTP_OK);
     }


     public function show($id)
     {
         $model = $this->model->find($id);
         return $model ?? response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
     }


     
}
