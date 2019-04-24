@extends('admin.master')
@section('content')
   <div class="card text-center">
       @foreach ($posts as $post)
       <div class="card-body">
            <h4 class="card-title">{{$post->title}}</h4>
            <p class="card-text">{{Str::limit($post->description,100)}}</p>
       <a class="btn btn-danger" href="{{route('custom-delete',$post->id)}}">Delete</a>
          </div>
       @endforeach
   </div>
   <div class="text-center">
       @if (function_exists('links'))
       {{$posts->links()}}
       @endif
   </div>
@endsection