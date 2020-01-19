@extends('layouts.app')

@section('content')

    @include('common.errors')
    
    <div class="container">
    <form action="{{ url('/detailCreate') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
      
      <input type='hidden' name="id" value="{{ $detail->id }}"></input>

      <div class="form-group">
        <label class="col-sm-3 control-label">Название</label>
        <div class="col-sm-6">
          <input type="text" name="name" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label">Описание</label>
        <div class="col-sm-10">
            <textarea name="description" rows="5" class="form-control"> </textarea>
        </div>
      </div>


      <div class="row" style="padding:15px;">
        <div class="col-sm-8">

          <button type="button" onclick="createCheckboxes()" class="btn btn-default">
            Add checkbox
          </button>

          <button type="button" onclick="removeElement()" class="btn btn-default">
            Remove checkbox
          </button>

          <button type="submit" class="btn btn-success">
            Add check-list
          </button>

        </div>
      </div>

      
        <div class="container" id="place">
        </div>
    </form>

    </div>

  <script>
  var count = 0;

  function removeElement(){
    var rElement = document.getElementById('formGroup' + count)
    rElement.parentNode.removeChild(rElement);
    if(count > 0){
        count -= 1;
    }
  }

  function createCheckboxes(){
    if(count < 5){
      count++;
      var place = document.getElementById('place');
      var formGroup = document.createElement('div');
      var detailDescription = document.createElement('input');
      detailDescription.id = 'checkboxDescriptionId' + count;
      detailDescription.name = 'checkboxDescriptionName' + count;
      detailDescription.className = 'form-control';
      formGroup.id = 'formGroup' + count;
      formGroup.className = "form-group";
      place.appendChild(formGroup);
      formGroup.appendChild(detailDescription);
    }
  }
  </script>
@endsection