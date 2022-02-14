@extends('layouts.app')
@section('title')
    Create Post
@endsection

@section('content')
@if ($errors)
        @foreach($errors->all() as $error)
             <div class="alert bg-red-500 mx-6 my-4 p-2 rounded-md flex flex-row justify-center"><p class="text-red-700">{{$error}}</p></div>
        @endforeach
@endif
@if(session('sucess'))
<div class="alert flex flex-row justify-center bg-green-500 text-bold rounded-md mx-7 my-2 p-2">{{session('sucess')}}</div>
@endif
<div class="mt-8 mx-8 flex justify-center bg-white shadow-md rounded-md">
    
    <div class="flex flex-col">
        <h3 class="text-gray-500 text-sm mt-4 mb-4">CREATE POST</h3>

    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="body" class="ckeditor border-gray-200 rounded-md focus:bg-indigo-300 placeholder:text-sm placeholder:text-gray-500 focus:placeholder:text-violet-700" placeholder="Pleas inter content" id="" cols="30" rows="10"></textarea>
        <button class="bg-violet-700 py-2 px-4 mt-3 rounded-xl text-white font-semibold hover:bg-violet-900">Add Post</button>
    </form>
    </div>
</div>
    @once
        @push('script')
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
          <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
          <script>
            $(document).ready(function(){
                $('.ckeditor').ckeditor();
           })
           setTimeout(() => {
                    $(".alert").hide();
                  }, 5000);
         </script>
          @endpush
    @endonce
   
       
@endsection



