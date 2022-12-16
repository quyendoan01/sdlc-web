@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main_top">

            @if (isset($add))
                <script>
                    window.alert($add)
                </script>
            @endif

            @if (isset($successms))
                <h3 class="welcome">
                    Search result for "{{ $successms }}"!
                </h3>

                <div class="card_list">
                    @foreach ($videosa as $video)
                        <a class="card_link" href="@guest
                        #
                                            @else
                                            {{ route('play_song', $video->id) }} @endguest
                        ">
                            <div class="card_single">
                                <div class="card_child">
                                    <div class="c_img">
                                        <img class="card_img" src="{{ $video->video_image }}" alt="...">
                                        {{-- <iframe src="https://open.spotify.com/embed/{{ $video->video_url }}" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe> --}}
                                    </div>
                                    <div class="card_des">
                                        <h5>{{ $video->name }}</h5>
                                        <p style="margin: 0">{{ $video->author }}</p>
                                    </div>
                                    <div class="card_play">
                                        @guest
                                            Login to enjoy the music!
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
            @if ($videos == '[]')
                <h1 class="welcome">
                    No videos here!
                </h1>
            @else
                <h2 class="welcome">
                    Recommend for you!
                </h2>
            @endif
            <div class="card_list">
                @foreach ($videos as $video)
                    <a class="card_link"
                        href="
                    @guest
#
                    @else
                    {{ route('play_song', $video->id) }} @endguest

                    ">
                        <div class="card_single">
                            <div class="card_child">
                                <div class="c_img">
                                    <img class="card_img" src="{{ $video->video_image }}" alt="...">
                                    {{-- <iframe src="https://open.spotify.com/embed/{{ $video->video_url }}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe> --}}
                                </div>
                                <div class="card_des">
                                    <h5>{{ $video->name }}</h5>
                                    <p style="margin: 0">{{ $video->author }}</p>
                                </div>
                                <div class="card_play">
                                    @guest
                                        Login to enjoy the music!
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @if (isset($listvideos))
                <h2 class="welcome">
                    The others song
                </h2>
                @foreach ($listvideos as $video)
                    <a class="card_link"
                        href="@guest
#
                    @else
                    {{ route('play_song', $video->id) }} @endguest">
                        <div class="card_single">
                            <div class="card_child">
                                <div class="c_img">
                                    <img class="card_img" src="{{ $video->video_image }}" alt="...">
                                    {{-- <iframe src="https://open.spotify.com/embed/{{ $video->video_url }}" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe> --}}
                                </div>
                                <div class="card_des">
                                    <h5>{{ $video->name }}</h5>
                                    <p style="margin: 0">{{ $video->author }}</p>
                                </div>
                                <div class="card_play">
                                    @guest
                                        Login to enjoy the music!
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
        <div style="height: 450px">
            &nbsp;
        </div>
    </div>
@endsection
