@extends('layout.master')

@section('title')
    profile
@endsection

@section('header')
    Profile
@endsection

@section('content')
    <div class="w-100">
        <div class="container mb-4 p-3 d-flex justify-content-center ">
            <div class="card p-4 w-100 shadow-lg">
                <div class=" image d-flex flex-column justify-content-center align-items-center">
                    <div class="card shadow-lg p-4">
                        <a class="text-right font-weight-bold" href="{{ route('delete.image', ['name' => $user->username.".jpg"]) }}">x</a>
                        <img  src="
                    @if(\Illuminate\Support\Facades\File::exists(public_path("images/".$user->username.".jpg")))
                        {{ URL::asset("images/".$user->username.".jpg")}}
                    @elseif(\Illuminate\Support\Facades\File::exists(public_path("images/".$user->username.".png")))
                        {{ URL::asset("images/".$user->username.".png")}}
                    @else
                        {{ URL::asset("images/user.png")}}
                    @endif
                    " width="150"/>
                        <span class="name mt-3"> <span class="font-weight-bold">User Name: </span>{{ $user->username }}</span>
                        <span class="idd"><span
                                class="font-weight-bold">User Title: </span>{{ $user->usertitle }}</span>
                    </div>
                    <div class="d-flex mt-2 flex-column text-center">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        @endif
                        <form action="{{route('upload.image', ['id' => $user->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex flex-column card p-3 w-100 shadow-lg">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                </div>
                                <button class="btn btn-primary mt-2" type="submit">Save Image</button>
                            </div>

                        </form>
                    </div>
                    <div class=" px-2 rounded mt-4 date "><span
                            class="join">Joined {{ \Carbon\Carbon::parse($user->created_at)->format('F Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
