@extends('layouts.app')

@section('content')
    @include('errors.errors2')
    
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

            <button type="button" class="btn btn-default" id="addButton">
              Add checkbox
            </button>

            <button type="button" class="btn btn-default" id="removeButton">
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
   /* document.addEventListener("DOMContentLoaded", function () {
      addButton.addEventListener("click", createCheckboxes);
      removeButton.addEventListener("click", removeElement);

      var i = 0;

      function removeElement(){
        var rElement = document.getElementById('formGroup' + i)
        rElement.parentNode.removeChild(rElement);
        if(i > 0){
            i -= 1;
        }
      }

      function createCheckboxes(){
        if(i < 5){
          i++;
          var place = document.getElementById('place');
          var formGroup = document.createElement('div');
          var detailDescription = document.createElement('input');
          detailDescription.id = 'checkboxDescriptionId' + i;
          detailDescription.name = 'checkboxDescriptionName' + i;
          detailDescription.className = 'form-control';
          formGroup.id = 'formGroup' + i;
          formGroup.className = "form-group";
          place.appendChild(formGroup);
          formGroup.appendChild(detailDescription);
        }
      }
  });*/
  </script>
@endsection