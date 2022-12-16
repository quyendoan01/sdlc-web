@extends('layouts.app')
@section('content')
    <h1 class="welcome">New CD</h1>
    <div class="song_list">
        <div class="container">
            <div class="song_group">
                @if (isset($newcda))
                    <input type="hidden" name="{{ $i = 1 }}">
                    @foreach ($newcda as $listtrend)
                        <a class="a_none" href="@guest
                        #
                        @else
                        {{ route('newcd_song', $listtrend->id) }}
                        @endguest">
                            <div class="song_single">
                                <div class="song_child">
                                    <div class="song_left">
                                        <div class="song_number">
                                            <span class="s_number">{{ $i }}</span>
                                            <input type="hidden" name="{{ $i++ }}">
                                        </div>
                                        <div class="song_img">
                                            <img class="s_img" src="{{ $listtrend->video_image }}" alt="...">
                                        </div>
                                        <div class="song_title">
                                            {{ $listtrend->name }}
                                        </div>
                                    </div>
                                    <div class="song_center">
                                        <span class="s_center">{{ $listtrend->author }}</span>
                                    </div>
                                    <div class="song_right">
                                        <div class="song_action">
                                            Release: {{ $listtrend->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    <div style="height: 200px">
        &nbsp;
    </div>
@endsection
