@extends('layouts.app')

@section('content')
    @include('errors.errors')
    <form action="{{ url('checkListStore') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <div class="form-group">
        <label class="col-sm-3 control-label">Задача</label>
        <div class="col-sm-6">
          <input type="text" name="name" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label">Краткое описание</label>
        <div class="col-sm-6">
            <textarea rows="6" name="description" class="form-control"> </textarea>
        </div>
      </div>

      <div class="form-group" style='padding-left:15px;'>
            <button type="submit" class="btn btn-success">
              Add check-list
            </button>
      </div>
    </form>
@endsection