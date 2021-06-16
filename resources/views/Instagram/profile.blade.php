@extends('layouts.layoutsinsta')
@section('content')

<main class="profile-container">
    <section class="profile">
        
        <header class="profile__header">
            <div class="profile__avatar-container">
                <img 
                    src="{{asset('storage/'.$info['photo'])}}"
                    class="profile__avatar"
                />
            </div>
            <div class="profile__info">
                <div class="profile__name">
                    <h1 class="profile__title">{{$info['name']}}</h1>
                    <a href="{{route('edit_profile',['id'=>Auth::user()->id])}}" class="profile__button u-fat-text">Edit profile</a>
                    <i class="fa fa-cog fa-2x" id="cog"></i>
                </div>
                <ul class="profile__numbers">
                    <li class="profile__posts">
                        <span class="profile__number u-fat-text">{{$data->count()}}</span> posts
                    </li>
                    <li class="profile__followers">
                        <span class="profile__number u-fat-text">{{$follow_number->can_be_followed->count()}}</span> followers
                    </li>
                    <li class="profile__following">
                        <span class="profile__number u-fat-text">{{$follow_number->can_follow_users->count()}}</span> following
                    </li>
                </ul>
                <div class="profile__bio">
                    <span class="profile__full-name u-fat-text">{{$info['name']}}</span>
                    <p class="profile__full-bio">{{$info['bio']}}</p>
                </div>
            </div>

        </header>
        
        <div class="profile__pictures">
            @foreach($data as $item)
            <a href="image-detail.html" class="profile-picture">
                <img
                    src="{{asset('storage/'.$item->photo)}}"
                    class="profile-picture__picture"
                />
                <div class="profile-picture__overlay">
                    <span class="profile-picture__number">
                        <i class="fa fa-heart"></i> {{$item->can_have_likes->count()}}
                    </span>
                    <span class="profile-picture__number">
                        <i class="fa fa-comment"></i> {{$item->can_have_comments->count()}}
                    </span>
                </div>
            </a>
            @endforeach
        </div>
        
    </section>
</main>

@endsection