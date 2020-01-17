@extends('layouts.app')

@section('content')
    @foreach ($details as $detail)
    <div>
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
                        <div class="col-6 text-right">
                            <button onclick="createCheckboxes()" id="addButton" type="button">Подробности</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <div class="container" id="place">
        </div>
    </div>
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
        document.addEventListener("DOMContentLoaded", () => {
            if({{ $detail->Main_check }} == 1){
                document.getElementById('mainCheck{{ $i }}').checked = 'checked';
            }
        });

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
@endsection