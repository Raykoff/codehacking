@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="form-group" style="padding-top: 20px;">
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">

            {{csrf_field()}}

            <div class="form-group" style="padding-bottom: 10px">
                <input type="text" class="form-control" value="{{old('title')}}" name="title" size="91" placeholder="Titulo..." style="width: 70%">
            </div>

            <div class="form-group">
                <textarea class="form-control" name="text" rows="12" placeholder="Texto..." style="overflow: auto; resize: none; width: 70%;">{{old('text')}}</textarea>
            </div>


            <div class="form-group">
                <label for="file">Imagen</label>
                <input type="file" name="file">
            </div>
            <div class="form-group">
                @if (count($errors) > 0)
                    <div class="alert alert-danger" style="width: 70%">

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif
            </div>
            <div class="form-group" >
                <input type="submit" class="btn btn-success" >
            </div>
        </form>

        </div>

    </div>

@endsection