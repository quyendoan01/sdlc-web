@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main_top">

            @if (isset($add))
                <script>
                    window.alert($add)
                </script>
            @endif


            @if (isset($group))
                @foreach ($group as $group)
                    <h2 class="welcome">
                        {{ $group->category }}</h2>
                    <div class="card_list">
                        <input type="hidden"
                            name="{{ $video = DB::table('videos')->where('category', '=', $group->category)->get() }}">
                        @foreach ($video as $video)
                            <a class="card_link" href="@guest
                            #
                            @else
                            {{ route('cate_song', $video->id) }}
                            @endguest">
                                <div class="card_single">
                                    <div class="card_child">
                                        <div class="c_img">
                                            <img class="card_img" src="{{ $video->video_image }}" alt="...">

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
                @endforeach
            @endif
        </div>
        <div style="height: 200px">
            &nbsp;
        </div>
    </div>
@endsection
