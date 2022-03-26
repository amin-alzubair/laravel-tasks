@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            <div class="">
                <div class="p-6">
                <div class="flex flex-row  mx-0">
                <div class="flex flex-col">
                    <img src="https://tailwindcss.com/_next/static/media/sarah-dayan.a8ff3f1095a58085a82e3bb6aab12eb2.jpg" class="h-24 w-24 rounded-full justify-start" alt="">
                    <span class="text-gray-400 text-md font-semibold  mt-1">{{$user->name}}</span>
                    <div class="flex space-x-4 my-4">
                    @if ($user->id != auth()->id())
                    <form>
                      @csrf
                      <input type="hidden" id="frinedId" name="user_id" value="{{$user->id}}">
                      @if (auth()->user()->hasSentFriendRequestTo($user))
                      <button class="text-orange-500" type="submit"  id="unfriend">Requsted</button>
                      <button class="text-orange-500 hidden" type="submit"  id="add-friend">add friend</button>
                      @elseif($user->hasSentFriendRequestTo(auth()->user()))
                      <button class="text-orange-500" type="submit"  id="accept-friend">accepte</button>
                      <button class="text-orange-500" type="submit"  id="deny-friend">deny</button>
                      <button class="text-orange-500 hidden" type="submit"  id="add-friend">add friend</button>
                      <button class="text-orange-500 hidden" type="submit"  id="unfriend">unfriend</button>
                      @elseif(auth()->user()->isFriendWith($user))
                      <button class="text-orange-500 mx-3" type="submit"  id="unfriend"><i class="fa-solid fa-user-check fa-xl mx-2"></i>Unfriend</button>
                      <a href="/messenger/{{$user->id}}" class="text-orange-500" type="submit"  id="unfriend"><i class="fa fa-message fa-xl"></i></a>
                      <button class="text-orange-500 hidden" type="submit"  id="add-friend">add friend</button>
                      @else
                      <button class="text-orange-500" type="submit"  id="add-friend">add friend</button>
                      <button class="text-orange-500 hidden" type="submit"  id="unfriend">requested</button>
                      @endif
                    </form>
                    @else
                    <a href="{{route('friends.get-friendsrequests')}}" class="text-orange-500 "><span class="h-5 w-5  rounded-full bg-red-500 text-white">{{auth()->user()->getFriendRequests()->count()}}</span><i class="fa fa-user-plus fa-xl"></i></a>
                    @endif
                    <a href="{{route('friends.get-friends',$user->id)}}" class="text-orange-500" id="get-friends">{{$user->getFriendsCount()}} <i class="fa fa-users fa-xl"></i></a>
                    </div>
                </div>
                </div>
                    <div class="flex flex-col  text-white">
                    @foreach ($user->posts as $post)
                    
                    <div class="flex flex-col my-2 mx-3 text-white text-base bg-gray-600 rounded-md shadow-md p-4">
                        <p class="">
                            {!!$post->body!!}
                        </p>
                        <div class="text-sm text-orange-500 mx-4 my-3">
                            {{$post->publish_at()}}
                        </div>
                       </div>
                    @endforeach
                </div>
                </div>
            </div>
    </div>
    
        @include('layouts.scriptes')
@endsection
