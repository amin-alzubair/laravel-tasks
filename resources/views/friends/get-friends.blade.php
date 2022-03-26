@extends('layouts.app')

@section('title')
    Freind-list
@endsection

@section('content')
    <section><
    
        <div class="grid  md:grid-cols-3 xl:grid-cols-3 lg:grid-cols-4 sm:grid-cols-1">
            <!-- start-->
              @foreach($friends as $friend)
                <div class="inline-flex bg-gray-800 shadow-md rounded-md  ml-2 mb-2 text-orange-400 space-x-3">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80" alt="User image" srcset="" class="h-16 w-16 rounded-full justify-start" alt="" srcset="">
                    <div class="mt-6 text-gray-300 space-x-3">
                    <span >{{$friend->name}}</span>
                    <span>{{$friend->getFriendsCount()}} friends</span>
                    <span>{{$friend->posts()->count()}} posts</span>
                    <span class="hover:underline hover:text-gray-500"><a href="{{route('show.profile',$friend->id)}}">show profile</a></span>
                    </div>
                </div>
              @endforeach
    
             <!-- end-->  
    </div>
    
 </section>
@endsection