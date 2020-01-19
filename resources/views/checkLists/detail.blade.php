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
                                    <input type="checkbox" onclick="checkEvery{{ $i }}()" class="form-check-input" id="mainCheck{{ $i }}">
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
            <div class="col text-center" id="placeForTextId">
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

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if(  {{ $detail->Main_check }} == 1 ){
                document.getElementById('mainCheck{{ $i }}').checked = 'checked';
            }
        });

        /*document.addEventListener("DOMContentLoaded", () => {
            if( {{ $detail->secondary_check5 }} == 0){
                document.getElementById('secondCheck5{{ $i }}').checked = 'checked';
            }
        });*/

//////////////////////////////Фетч для главных чекбоксов
        function checkEvery{{ $i }}(){
            let x = document.getElementById("mainCheck{{ $i++ }}").checked;
            if(x){result = 1;}else{result = 0;}
            fetchCheckMain();

            async function fetchCheckMain(){
                let formData = new FormData();
                formData.append('value', result);
                formData.append('id', '{{ $detail->id }}' );

                let response = await fetch('/detailFetch', {
                    headers : {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    method: 'POST',
                    body: formData
                });
            }
        }
    </script>
    @endforeach

    <script>
//////////////////////////////
        document.addEventListener("DOMContentLoaded", function () {
            var checkBoxes = document.querySelectorAll("#secondCheck");

            checkBoxes.forEach(function(item, i){
                item.addEventListener("click", check);
                function check(){
                    if(checkBoxes[i].checked){
                        resultat = 1;
                    }else{
                        resultat = 0;
                    }
                    let id = checkBoxes[i].attributes[2].value;

                    let dig = i;
                    if(dig > 4){
                        dig -= 5;
                    }

                    fetchCheckSecondary();
////////////////////////////Фетч для дополнительных чекбоксов
                    async function fetchCheckSecondary(){
     
                        let formData = new FormData();
                        formData.append('value', resultat);
                        formData.append('id', id );
                        formData.append('secondaryId', dig );

                        let response = await fetch('/detailSecondaryFetch', {
                            headers : {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                            method: 'POST',
                            body: formData
                        });

                        result = await response.text();
                    }
                }
            });
        });
//////////////////////Показать\скрыть выпадающее меню
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
////////////////////Регулярка для ссылки
            var places = document.querySelectorAll("#description");
            places.forEach(function(item, i){
                var text = places[i].innerText;
                var re = /([^\"=]{2}|^)((https?|ftp):\/\/\S+[^\s.,> )\];'\"!?])/; 
                var subst = '$1<a href="$2">$2</a>';
                text = text.replace(re, subst)
                item.innerHTML = text;
            });
        });
///////////////////////
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
                var checkBoxes = document.querySelectorAll("#secondCheck");
                //
                    //console.log(result[1]['id']); // 2
                    //console.log(checkBoxes[0].value); // 10
                //}
        for(var w = 0; w < 10; w++){
            for(var q = 0; q < 2; q++){
                if(result[q]['id'] == checkBoxes[w].value){
                    for(var j = 0; j < 5; j++){
                        if(result[q]['secondary_check' + j] == 1){
                            //checkBoxes[w].checked = 'checked';
                            console.log(w);
                            break;
                        }
                    }
                    //console.log(checkBoxes[w]);
                }
            }
        }
            
                


                    //if(result[j]['secondary_check0'] == 1){
                    //    checkBoxes[i].checked = 'checked';
                    //}
                    //checkBoxes[i].checked = 'checked';
                    //console.log(result[0]['secondary_check' + i]);
                    //console.log(result[1]['secondary_check' + i]);

                //console.log(result);
            });
        });

    </script>
@endsection