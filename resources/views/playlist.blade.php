@extends('layouts.app')

@section('content')
    <div class="welcome">
        @if (isset($library_name))
            <h2 class="welcome">{{ $library_name }}</h2>
        @endif

    </div>
    <div class="container">
        <div class="main_top">
            <table class="add_tbl">
                @if (isset($uservideo))
                    @foreach ($uservideo as $video)
                        <input type="hidden"
                            name=" {{ $videos = DB::table('videos')->where('id', '=', "$video->vid")->get() }}">
                        @foreach ($videos as $video)
                            <a class="card_link" href="{{ route('playlist_song', $video->id) }}">
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
                                            <form action="{{route('delSongLib')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="vid" value="{{$video->id}}">
                                            <button type="submit" class="btn btn-secondary"><i class="bi bi-trash3" style="font-size: 0.8em"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endforeach
                @endif
            </table>
        </div>
    </div>
    <div style="height: 400px">
        &nbsp;
    </div>
@endsection
