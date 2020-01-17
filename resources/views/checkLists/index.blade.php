@extends('layouts.app')

@section('content')

  <!-- Bootstrap шаблон... -->


    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="{{ url('checkListStore') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <!-- Имя задачи -->
      <div class="form-group">
        <label class="col-sm-3 control-label">Задача</label>
        <div class="col-sm-6">
          <input type="text" name="name" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label">Краткое описание</label>
        <div class="col-sm-6">
            <input type="text" name="description" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-sm-4">
            <button type="button" onclick=createCheckboxes() id="addButton" class="btn btn-default">
              <i class="fa fa-plus"></i> Add checkbox
            </button>
            <button type="submit" class="btn btn-default">
              <i class="fa fa-plus"></i> Add check-list
            </button>
          </div>
        </div>
      </div>
        <div class="container" id="place">
        </div>
    </form>

  <script>
    var count = 0;
      function createCheckboxes(){
        if(count++ < 5){
          var checkbox = document.createElement('input');
          var x = document.createElement('br');
          var formGroup = document.createElement('div');
          formGroup.className = "form-group";
          checkbox.type = "checkbox";
          checkbox.name = "checkboxName";
          checkbox.id = "checkboxId" + count;
          place.appendChild(formGroup);
          formGroup.appendChild(checkbox);
          place.appendChild(x);
        }else{
          addButton.hidden = true;
        }
      }
  </script>
@endsection