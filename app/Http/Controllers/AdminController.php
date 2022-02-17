<?php

namespace App\Http\Controllers;


use Exception;
use App\Models\Rack;
use App\Models\Books;
use App\Traits\GetDataTrait;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends Controller
{
    use GetDataTrait;
    public function index()
    {
        return view('dashboards.admin.index');
    }
    public function createRack()
    {
        return view('dashboards.admin.create-rack');
    }
    public function storeRack(Request $request)
    {
        Rack::storeRack(['rack_name' => $request->rack_name]);
        return redirect()->route('admin.createRack')->with('success', 'Succefully Inserted');
    }
    public function showRacks()
    {
        $racks = $this->getData(new Rack(), null, null);
        return view('dashboards.admin.show-racks', get_defined_vars());
    }
    public function createBook($id)
    {
        $rack = Rack::where('id', $id)->first();
        return view('dashboards.admin.create-book', get_defined_vars());
    }
    public function storeBook(Request $req, $rack_id)
    {

        $validated = $req->validate([
            'book_title' => 'required',
            'author' => 'required',
            'published_year' => 'required',
            'book_image' => 'required',
        ]);


        $book_img = $req->file('book_image');

        $book_imgName = time() . mt_rand(1000, 999999) . '_' . $book_img->getClientOriginalName();
        $book_img->move(public_path('book_image'), $book_imgName);
        $racks = Books::where('rack_id', $rack_id)->count();
        if ($racks >= 10) {
            return back()->with('error', 'Only 10 books can be added in Rack Please add in Another Rack');
        } else {
            $book = Books::insert([
                'book_title' => $req->book_title,
                'author' => $req->author,
                'published_year' => $req->published_year,
                'book_image' => 'book_image/' . $book_imgName,
                'rack_id' => $rack_id,
            ]);
            return back()->with('success', 'Succcfully Inserted');
        }
    }
    public function rackDetail($id)
    {
        $rackDetail = $this->getData(new Rack(), $id, null);
        $books = Books::where('rack_id', $rackDetail->id)->get();
        return view('dashboards.admin.rack-detail', get_defined_vars());
    }
}
