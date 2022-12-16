@extends('layouts.app')
@section('content')
    @if (isset($library))
        <h2 class="welcome">Library</h2>
        <div class="library_list">
            <div class="container">


                <div class="l_playlist">
                    <input type="hidden" name="{{ $library->library_name }}">
                    <a class="library_liked" href=" {{ route('playlist', $library->library_name) }}">
                        <div class="l_liked">
                            <div class="l_name">{{ $library->library_name }}</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

            @else
                <h2 class="welcome">No playlist!</h2>





    @endif
    <div style="height: 470px">
        &nbsp;
    </div>
@endsection
