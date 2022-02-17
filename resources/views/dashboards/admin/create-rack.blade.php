@extends('layouts.master')
@section('content')
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-2"></div>
      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <div>
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                </div>
            <h3 class="box-title">Create Rack</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('admin.storeRack')}}">
            @csrf
            <div class="box-body">
            <div class="form-group">
                <label>Rack_name</label>
                <input type="text" class="form-control" name="rack_name">
            </div>


            </div><!-- /.box-body -->

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            {{session('msg')}}
            </div>
        </form>
        </div>
    </div>
    </div>
 </section>
@endsection
<style>
    .error
    {
        color: red;
    }
</style>
