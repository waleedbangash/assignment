@extends('layouts.master')
@section('content')
<section class="content">
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
              <div class="box-header">
                 <h3 class="box-title">Rack Name:{{$rackDetail->rack_name}}</h3>
              </div><!-- /.box-header -->
             <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Book Title</th>
                                <th>Author</th>
                                <th>Published Year</th>
                                <th>Book Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            @foreach ($books as $books )
                            <td>{{$books->id}}</td>
                            <td>{{$books->book_title}}</td>
                             <td>{{$books->author}}</td>
                             <td>{{$books->published_year}}</td>
                             <td><img src="{{'/'.$books->book_image}}" alt="" height="40px", width="40px"></td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
            </div><!-- /.box-body -->
        </div>
    </div>
    </div>

</section>
@endsection
