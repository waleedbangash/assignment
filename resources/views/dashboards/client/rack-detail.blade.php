@extends('layouts.master')
@section('content')
<section class="content">
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
              <div class="box-header">
                @if (\Session::has('error'))
                <div class="alert alert-error">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
            @endif
                 <h3 class="box-title">Rack Name:{{$rackDetail->rack_name}}</h3>
              </div><!-- /.box-header -->
             <div class="box-body">
              <div>
                <form action="{{route('client.rackDetail',$rackDetail->id)}}" method="GET" role="search">

                    <div class="input-group">
                        <input type="text" class="form-control" name="q"
                            placeholder="Search users"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
              </div>
                 <br><br><br>
                 @if(isset($books))

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
                    @endif
            </div><!-- /.box-body -->
        </div>
    </div>
    </div>

</section>
@endsection
