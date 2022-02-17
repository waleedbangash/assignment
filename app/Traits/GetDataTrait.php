<?php
namespace App\Traits;

trait GetDataTrait{

    public function getData($model,$id=null,$rack_id=null){
          if(is_null($id) && is_null($rack_id)){
           return $model::all();
          }
          if($id){

            return $model::where('id',$id)->first();
          }
    }
}

?>
