@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-dark text-white">Absen Online</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="card">
                                <div class="container-absen mt-5" style='width: 100%; height: 65vh;'>
                                    <p class="text-center mt-5">Silahkan lakukan Absensi :</p>
                                    <h1 class="text-center" id="time"></h1>
                                    <div class="row justify-content-center mx-5">
                                        <div class="col-md-8 my-3">
                                            <select class="form-select text-center" id="date-input" name="date" aria-label="Default select example">
                                                <option selected disabled>Pilih Tanggal : </option>
                                                <option value="{{ $today }}">{{ $today }}</option>
                                                <option value="{{ $yesterday }}">{{ $yesterday }}</option>
                                            </select>
                                        </div>
                                        <ul class="d-flex justify-content-center" style="list-style-type: none;">
                                            <li>
                                                
                                                    <button class="btn btn-success mx-2" style="width:80px;" type="button" id="in-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Masuk</button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ambil Photo</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row justify-content-center mx-3">
                                                                {{-- picture capture --}}
                                                                <div class="col-sm-6">
                                                                    <video id="preview"></video>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <canvas id="output" style="display:none;"></canvas>
                                                                    <img src="" alt="" id="result">
                                                                </div>
                                                            </div>
                                                            <button type="button" class="btn btn-primary mt-3" id="capture">Capture</button>

                                                            <form action="home/in" method="POST">
                                                                @csrf
                                                                <input id="user_id" name="user_id" value="{{ $user_id }}" type="hidden" >
                                                                <input id="name" name="name" value="{{ $name }}" type="hidden" >
                                                                <input id="in" name="in" value="{{ $time }}" type="hidden">
                                                                <input id="longitude" name="longitude" value="" type="hidden" >
                                                                <input id="latitude" name="latitude" value="" type="hidden" >
                                                                <input id="date-in" name="date" type="hidden">
                                                                <input id="picture" name="picture" type="hidden">
                                                                <img src="" alt="{{ asset("storage/". $query) }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" id="btnUpload" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                                </form>
                                            </li>
                                            <li>
                                                <form action="home/out" method="POST">
                                                    @csrf
                                                    <input id="user_id" name="user_id" value="{{ $user_id }}" type="hidden" >
                                                    <input id="name" name="name" value="{{ $name }}" type="hidden" >
                                                    <input id="out" name="out" value="{{ $time }}" type="hidden">
                                                    <input id="date-out" name="date" type="hidden">
                                                    <button class="btn btn-danger mx-2" id="out-button" style="width:80px;" type="submit">Keluar</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    @if(session()->has('failed'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-3 mx-5" role="alert">
                                        {{ session('failed') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @elseif(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show mx-5 mt-3" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div id='map' style='width: 100%; height: 73vh;'></div>
                            <pre id="info"></pre>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
