@extends('layouts.appad')

@section('content')
    <div class="welcome">
        @if (isset($listuser))
            <h2 class="welcome">Manage user account</h2>
        @endif
        <script></script>
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
        <div style="display: block">
            <a href="{{ route('add_admin') }}">
                <div class="add_btn">
                    <button type="button" class="add_btn btn btn-light ">Add admin account</button>
                </div>
            </a>
        </div>

    </div>
    <div class="container">
        <div class="main_top">
            <table class="add_tbl">
                <tr>
                    <td>ID</td>
                    <td>Name</td>

                    <td>Email</td>
                    <td>Password</td>
                    <td></td>
                </tr>
                @if (isset($listuser))
                    @foreach ($listuser as $video)
                        <tr>
                            <td class="add_td">{{ $video->id }}</td>
                            <td class="add_td">{{ $video->name }}</td>

                            <td class="add_td">{{ $video->email }}</td>
                            <td class="add_td">{{ $video->password }}</td>
                            @if ($video->id != 1)
                                <td class="add_td"><a class="add_btn btn btn-light" href="{{ route('user_edit', $video->id)}}">Edit</a></td>
                                <td class="add_td"><a class="add_btn btn btn-light" href="{{ route('user_delete', $video->id)}}">Delete</a></td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
    <div style="height: 200px">
        &nbsp;
    </div>
@endsection
