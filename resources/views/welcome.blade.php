@extends('layouts.app')

@section('content')
    @auth
        @foreach ($UserCheckLists as $checkList)
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
                                    <h5 class="card-title"><a href="{{ route('detail', $checkList->id) }}">{{$checkList->name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 text-center">
                                {{$checkList->description}}
                                <br>
                                <p id="txt{{ $i }}"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    if({{ $checkList->Main_check }} == 1){
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
                        formData.append('id', '{{ $checkList->id }}' );

                        let response = await fetch('/checkFetch', {
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
    @endauth
@endsection