@extends('layouts.appad')

@section('content')
    <div class="welcome">
        @if (isset($videos))
            UPDATE
        @else
            UPLOAD VIDEO
        @endif

    </div>
    <div class="container">
        <div class="main_top">
            <form
                action="@if (isset($videos)) {{ route('video_edit', $videos->id) }}
            @else
            {{ route('add') }} @endif"
                method="POST" enctype="multipart/form-data">
                @csrf
                <table class="add_tbl">
                    <tr>
                        <td>Name</td>
                        <td>
                            <input class="form-control" name="name" type="text" placeholder="Name of video" required
                                value="@if (isset($videos)) {{ $videos->name }} @endif">
                        </td>
                    </tr>
                    <tr>
                        <td>Video URL/MP3</td>
                        <td><input class="form-control-file" type="file" name="filename" id="filename" required></td>
                    </tr>
                    <tr>
                        <td>Video Image</td>
                        <td><input class="form-control" name="video_image" type="text" placeholder="https://....jgp/png"
                                required value="@if (isset($videos)) {{ $videos->video_image }} @endif"></td>
                    </tr>
                    <tr>
                        <td>Video Author</td>
                        <td><input class="form-control" name="author" type="text" placeholder="Author of video" required
                                value="@if (isset($videos)) {{ $videos->author }} @endif"></td>
                    </tr>
                    <tr>
                        <td>Video Description</td>
                        <td><input class="form-control" name="description" type="text" placeholder="Description" required
                                value="@if (isset($videos)) {{ $videos->description }} @endif"></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><input class="form-control" name="category" type="text" placeholder="Category" required
                                value="@if (isset($videos)) {{ $videos->category }} @endif"></td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ url('/admin') }}">
                                <div class="add_btn">
                                    <button type="button" class="add_btn btn btn-light">Back</button>
                                </div>
                                <a>
                        </td>
                        <td>
                            <div class="add_btn">
                                <button type="submit" class="add_btn btn btn-light">
                                    @if (isset($videos))
                                        Update
                                    @else
                                        Add
                                    @endif
                                </button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
