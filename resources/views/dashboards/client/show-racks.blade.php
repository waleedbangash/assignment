@extends('layouts.master')
@section('content')
<section class="content">
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
              <div class="box-header">
                 <h3 class="box-title">Racks</h3>
              </div><!-- /.box-header -->
             <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Rack Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($racks as $rack)
                              <tr>
                                  <td>{{$rack->id}}</td>
                                  <td>{{$rack->rack_name}}</td>
                                  <td><a href="{{route('client.rackDetail',$rack->id)}}">Show Detail</a></td>
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
