@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <a class="btn btn-success" href="{{ route('detailCreate', $str->id) }}">create details</a>
</div>
    @foreach ($details as $detail)
    <div id="mainDiv">
        <div class="container mt-4">
            <div class="card mb-3">
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <input type="checkbox" class="form-check-input" id="mainCheck" value="{{ $detail->id }}">
                                </div>
                                <div class="col-6 text-center">
                                    <h5 class="card-title">{{ $detail->detailName }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-right" style="margin-left:100px;">
                            <input id='detailId' type="button" class='btn btn-default' value="details..."></input>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div hidden class="container" id='containerId'>
            <div class="col text-center" id="placeForTextId" value="{{ $detail->id }}">
                <div id="description">
                    {{ $detail->description }}
                </div>
                @if($detail->secondary_input0 != null)
                    <div class="alert alert-secondary">
                        <div class='row'>
                            <div class='col-1'>
                                <input type="checkbox" id="secondCheck" value="{{ $detail->id }}"></input>
                            </div>
                            <div class="col-10 text-left">
                                {{ $detail->secondary_input0 }}
                            </div>
                        </div>
                    </div>
                @endif

                @if($detail->secondary_input1 != null)
                    <div class="alert alert-secondary">
                        <div class='row'>
                            <div class='col-1'>
                                <input type="checkbox" id="secondCheck"  value="{{ $detail->id }}"></input>
                            </div>
                            <div class="col-10 text-left">
                                {{ $detail->secondary_input1 }}
                            </div>
                        </div>
                    </div>
                @endif

                @if($detail->secondary_input2 != null)
                    <div class="alert alert-secondary">
                        <div class='row'>
                            <div class='col-1'>
                                <input type="checkbox" id="secondCheck"  value="{{ $detail->id }}"></input>
                            </div>
                            <div class="col-10 text-left">
                                {{ $detail->secondary_input2 }}
                            </div>
                        </div>
                    </div>
                @endif

                @if($detail->secondary_input3 != null)
                    <div class="alert alert-secondary">
                        <div class='row'>
                            <div class='col-1'>
                                <input type="checkbox" id="secondCheck"  value="{{ $detail->id }}"></input>
                            </div>
                            <div class="col-10 text-left">
                                {{ $detail->secondary_input3 }}
                            </div>
                        </div>
                    </div>
                @endif

                @if($detail->secondary_input4 != null)
                    <div class="alert alert-secondary">
                        <div class='row'>
                            <div class='col-1'>
                                <input type="checkbox" id="secondCheck"  value="{{ $detail->id }}"></input>
                            </div>
                            <div class="col-10 text-left">
                                {{ $detail->secondary_input4 }}
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    @endforeach

    <script>
                /**
                Онклик для главных чекбоксов
                */
        document.addEventListener("DOMContentLoaded", function () {
            var checkBoxesMain = document.querySelectorAll("#mainCheck");
            checkBoxesMain.forEach(function(item, i){
                item.addEventListener("click", mainCheck);
            });

            function mainCheck(){
                var result;
                var id = this.attributes[2].value;
                if(this.checked == 1){
                    result = 1;
                }else{
                    result = 0;
                }
                fetchCheckMain(id, result)
            }

                /**
                Фетч для главных чекбоксов
                */
            async function fetchCheckMain(id, result){
                let formData = new FormData();
                formData.append('value', result);
                formData.append('id', id );

                let response = await fetch('/detailMainFetch', {
                    headers : {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    method: 'POST',
                    body: formData
                });
            }

        });

                /**
                Онклик для дополнительных чекбоксов
                */
        document.addEventListener("DOMContentLoaded", function () {
            var checkBoxes = document.querySelectorAll("#secondCheck");
            var places = document.querySelectorAll("#placeForTextId");

            checkBoxes.forEach(function(item, i){
                item.addEventListener("click", check);
            });

            function check(){
                var resultat;
                for(let i=0; i < places.length; i++){
                    if(Array.prototype.indexOf.call(places[i].querySelectorAll("#secondCheck"), event.target) != -1){
                        var id = places[i].attributes[1].value;
                        var indexSecondary = (Array.prototype.indexOf.call(places[i].querySelectorAll("#secondCheck"), event.target));
                    }
                }
                if(this.checked == 1){
                    resultat = 1;
                }else{
                    resultat = 0;
                }
                fetchCheckSecondary(id, resultat, indexSecondary);
            }

                /**
                Фетч для дополнительных чекбоксов
                */
            async function fetchCheckSecondary(id, resultat, indexSecondary){
                let formData = new FormData();
                formData.append('value', resultat);
                formData.append('id', id );
                formData.append('secondaryId', indexSecondary );

                let response = await fetch('/detailSecondaryFetch', {
                    headers : {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    method: 'POST',
                    body: formData
                });
                result = await response.text();
            }
        });

                /**
                Показать\скрыть выпадающее меню
                */
        document.addEventListener("DOMContentLoaded", function () {
            var detailsButt = document.querySelectorAll("#detailId");
            detailsButt.forEach(function(item, i){
                item.addEventListener("click", showPlace);
                function showPlace(){
                    var containerQuery = document.querySelectorAll("#containerId");
                    if(containerQuery[i].hidden == true){
                        containerQuery[i].hidden = false;
                    }else{
                        containerQuery[i].hidden = true;
                    }
                }
            });

                /**
                Регулярка для ссылки
                */
            var places = document.querySelectorAll("#description");
            places.forEach(function(item, i){
                var text = places[i].innerText;
                var re = /([^\"=]{2}|^)((https?|ftp):\/\/\S+[^\s.,> )\];'\"!?])/; 
                var subst = '$1<a href="$2">$2</a>';
                text = text.replace(re, subst)
                item.innerHTML = text;
            });
        });

                /**
                При загрузке страницы, отобразить состояния чекбоксов
                */
            document.addEventListener("DOMContentLoaded", function () {
            let response = fetch( '/showSecondary', {
                method:'get',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            })
            .then(response => {
                return response.json();
            })
            .then(result => {
                var places = document.querySelectorAll("#placeForTextId");
                var checkBoxes = document.querySelectorAll("#secondCheck");             
                var mainCheckBoxes = document.querySelectorAll("#mainCheck");             
                var arrDataBaseChecks = [];

                /**
                Отобразить главные чекбоксы
                */
                for(var q = 0; q < result.length; q++){ 
                    if(result[q].Main_check == 1){  
                        mainCheckBoxes[q].checked = 'checked';
                    }

                /**
                Отобразить второстепенные чекбоксы
                */
                    for(let w = 0; w < places[q].querySelectorAll("#secondCheck").length; w++){ 
                        arrDataBaseChecks.push(result[q]['secondary_check' + w]);
                    }
                }
                for(let i = 0; i < checkBoxes.length; i++){
                    if(arrDataBaseChecks[i] == 1){
                        checkBoxes[i].checked = 'checked';
                    };
                }
            });
        });

    </script>
@endsection