@extends('layouts.app')
@section('title')
    friends requests
@endsection

@section('content')
    <div class="mx-4 my-2">
        <div class="flex-col">
            @forelse($friendRequests as $friend)
            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80" alt="User image" srcset="" class="h-64 w-64 rounded-md justify-start" alt="" srcset="">
            <a href="{{route('show.profile',$friend->sender->id)}}" class="text-gray-400 my-5 font-semibold">{{$friend->sender->name}}</a>
            <div class="my-4">
                <form>
                  @csrf
                  <input type="hidden" name="user_id" value="{{$friend->sender->id}}" id="frinedId">
                <button  type="submit" id="accept-friend" class="text-white p-3 mr-2 rounded-md  font-semibold bg-orange-500 "><i class="fa fa-user-plus fa-xl"></i>Accept</button>
                <button  type="submit" id="deny-friend" class="text-gray-400 bg-gray-500 font-semibold p-3 rounded-md"><i class="fa-solid fa-user-minus"></i>Remove</button>
                </form>
            </div>
            @empty
                <div class="flex justify-center max-w-screen">
                    <span class="text-orange-500 my-50 text-justify font-semibold"><i class="fa-solid fa-face-frown fa-xl mx-2"></i><span>Empty!</span>
                </div>
            @endforelse
        </div>
    </div>

    @include('layouts.scriptes')
@endsection

    