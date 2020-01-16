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
      
      <div class="container">
        <div class="row">
          <div class="form-group">
            <div class="col-sm-4">
              <input type="button" onclick=createCheckboxes() value="Add checkbox" id="addButton"></input>
            </div>
          </div>

          <div class="col-sm-8" id="place">
            place
          </div>
        </div>
      </div>

      <!-- Кнопка добавления задачи -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Добавить задачу
          </button>
        </div>
      </div>
    </form>

  <script>
    var jojo = 0;
      function createCheckboxes(){
        if(jojo < 5){
          //alert(++jojo);
          ++jojo;
          var checkbox = document.createElement('input');
          checkbox.type = "checkbox";
          checkbox.name = "checkboxName";
          checkbox.id = "checkboxId";
          place.appendChild(checkbox);
        }else{
          addButton.hidden = true;
        }
      }
  </script>

  <!-- TODO: Текущие задачи -->
@endsection