@extends('layouts.app')

@section('content')
    @foreach ($details as $detail)
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
                </div>
            </div>
        </div>
    </div>
    <script>
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