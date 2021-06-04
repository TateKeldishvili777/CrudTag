@extends('posts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Movie</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group" id="select-container">
                     <strong>Description:</strong>
                     <select id="myMulti" multiple name="description" onChange="addTag(value)">
                         <option disabled>Choose Genres:</option>
                         <option value="Action">Action</option>
                         <option value="Adventure">Adventure</option>
                         <option value="Comedy">Comedy</option>
                         <option value="Crime and mystery">Crime and mystery</option>
                         <option value="Fantasy">Fantasy</option>
                     </select>


                 </div>
             </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
    <script type="text/javascript">
        function addTag(val) {
            let tag = document.createElement("div")
            tag.style.background = "#D3D3D3";
            tag.style.width = "100px";
            tag.style.color = "black";
            tag.append("#",val)
            document.getElementById('myMulti').append(tag)
            document.getElementById('select-container').append(
                tag
            )
        }

    </script>
@endsection
