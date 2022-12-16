@extends('layouts.appad')

@section('content')
    <div class="container">
        <div class="main_top">
            @if (isset($successms))
            <h3 class="welcome">
                Search result for "{{ $successms }}"!
            </h3>

            <div class="card_list">
                @foreach ($videosa as $video)
                    <a class="card_link" href="{{ route('play_songa',$video->id) }}">
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
                                    <i class="bi bi-play-circle"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

            <table>
                <tr>
                    <td style="width: 85%">
                        <h1 class="welcome">
                            @if (session('success'))
                                <span class="alert alert-success">
                                    <strong>{{ session('success') }}</strong>
                                </span>
                            @endif
                            @if (session('danger'))
                                <span class="alert alert-danger">
                                    <strong>{{ session('danger') }}</strong>
                                </span>
                            @endif
                        </h1>
                    </td>
                    <td>
                        <a href="{{ route('add') }}">
                            <div class="add_btn">
                                <button type="button" class="add_btn btn btn-light ">Add new video</button>
                            </div>
                        </a>
                    </td>
                </tr>
            </table>


            <div class="card_list">
                @foreach ($videos as $video)
                        <a class="card_link" href="{{ route('play_songa',$video->id) }}">
                            <div class="card_single">
                                <div class="card_child">
                                    <div class="c_img">
                                        <input type="hidden" name="id" value="{{ $video->id }}">
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
                                        <i class="bi bi-play-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                @endforeach
            </div>
        </div>
        <div style="height: 500px">
            &nbsp;
        </div>
    </div>
@endsection
