<?php

namespace App\Http\Controllers;

use App\Models\Rack;
use App\Models\Books;
use App\Traits\GetDataTrait;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class clientController extends Controller
{
    use GetDataTrait;
    public function index(){
        return view('dashboards.client.index');
    }
    public function showRacks()
    {
        $racks = $this->getData(new Rack(), null, null);
        return view('dashboards.client.show-racks', get_defined_vars());
    }
    public function rackDetail(Request $req,$id){
        $rackDetail=$this->getData(new Rack(),$id,null);
         $books=Books::where('rack_id',$rackDetail->id);
         $q =$req->q;
    $books =$books->where('book_title','LIKE','%'.$q.'%')->orWhere('author','LIKE','%'.$q.'%')->orWhere('published_year','LIKE','%'.$q.'%')->get();
    if(count($books) > 0)
        return view('dashboards.client.rack-detail',get_defined_vars())->withQuery($q);
       else return view('dashboards.client.rack-detail',get_defined_vars())->with('error','No Details found. Try to search again !');
  return view('dashboards.client.rack-detail',get_defined_vars());
 }
 public function search($id){


 }

}
