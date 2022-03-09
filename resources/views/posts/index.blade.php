@extends('layouts.app')
@section('title')
  POSTS
@endsection
@section('content')
@forelse ($posts as $post)
<div class="mx-6 my-6 shadow-md bg-gray-800 rounded-xl">
  <div class="flex justify-between">
    <div class="mx-3">
    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80" alt="User image" srcset="" class="h-16 w-16 rounded-full justify-start">
    <span class="text-white py-1 font-semibold text-sm"><a href="{{route('show.profile',$post->user->id)}}">{{$post->user->name}}</a></span>
    </div>
    <div class="text-gray-500 my-2 mx-4">
      <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="flex items-center text-sm font-medium text-white hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <!-- Authentication -->
            
            @can('edit',$post)
                <x-dropdown-link :href="route('posts.edit',$post->id)">
                    
                    {{ __('Edit') }}
                   
                </x-dropdown-link>

                <form action="{{route('posts.destroy',$post->id)}}" method="post">
                  @csrf
                  @method('DELETE')

                  <x-dropdown-link :href="route('posts.destroy',$post->id)" onclick="event.preventDefault();
                    this.closest('form').submit();">
                    
                    {{ __('DELETE') }}
                   
                </x-dropdown-link>
                </form>
            @endcan
        </x-slot>
    </x-dropdown>
    </div>
 </div> 
 <div class="flex flex-col my-2 mx-3 text-white text-md">
   <p class="">
       <a href="{{route('posts.show',$post->id)}}">{!!Str::limit($post->body,80,'...')!!}</a>
   </p>
   <div class="mx-4 my-3 text-sm text-orange-500">{{$post->publish_at()}}</div>
  </div> 
</div>
@empty
    <p class="flex my-2 mx-3">No Posts</p>
@endforelse

{{$posts->links()}}
@endsection