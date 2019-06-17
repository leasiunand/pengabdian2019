@extends('layouts.blank')

@section('title')
  Management Permission {{$role->name}}
@stop

@section('title-breadcrumb')
  Management Permission {{$role->name}}
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('role.index')}}">Role</a></li>
    <li class="breadcrumb-item"><a href="#!">Permission</a></li>
    <li class="breadcrumb-item"><a href="#!">{{$role->name}}</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::open(array('url' => route('role.simpan',$role->id),'files' => true,'class'=>'','data-parsley-validate','id'=>'demo-form2')) }}

      <div class="row">
        @foreach($actions as $action)
          <div class="col-sm-4">
              <?php $first= array_values($action)[0];
                  $firstname =explode(".", $first)[0];
              ?>
              {{Form::label($firstname, $firstname, ['class' => 'col-sm-4 col-form-label'])}}
              <div class="col-sm-12">
                  <select name="permissions[]" class="js-example-basic-multiple" multiple="multiple">
                      @foreach($action as $act)
                          @if(explode(".", $act)[0]=="api")
                              <option value="{{$act}}" {{array_key_exists($act, $role->permissions)?"selected":""}}>
                              {{isset(explode(".", $act)[2])?explode(".", $act)[1].".".explode(".", $act)[2]:explode(".", $act)[1]}}</option>
                          @else
                              <option value="{{$act}}" {{array_key_exists($act, $role->permissions)?"selected":""}}>

                              {{explode(".", $act)[1]}}

                              </option>
                          @endif
                      @endforeach
                  </select>
              </div>
          </div>
        @endforeach
      </div>
          <div class="row">
              <div class="col-sm-12 text-center">
                  <button type="submit" class="btn btn-primary m-b-0">Submit</button>
              </div>
          </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@stop
