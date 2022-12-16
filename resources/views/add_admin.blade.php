@extends('layouts.appad')

@section('content')
    <div class="welcome">
        Add New Admin Account
    </div>
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
    <div class="container">
        <div class="main_top">
            <form
                action="@if (isset($videos)) {{ route('user_edit_auth') }}
            @else
            {{ route('add_admin_auth') }} @endif"
                method="POST" enctype="multipart/form-data">
                @csrf
                <table class="add_tbl">
                    <tr>
                        <td>Name</td>
                        <td>
                            @if (isset($videos))
                                <input type="hidden" name="id" value="  {{ $videos->id }}">
                            @endif
                            <input class="form-control" name="name" type="text" placeholder="Name" required
                                value="@if (isset($videos)) {{ $videos->name }} @endif">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input class="form-control" name="email" type="email" placeholder="Email" required
                                value="@if (isset($videos)) {{ $videos->email }} @endif"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input class="form-control" name="password"
                                type="@if (isset($videos)) text @else password @endif" placeholder="Password"
                                required></td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td><input class="form-control" name="confirm-password"
                                type="@if (isset($videos)) text @else password @endif"
                                placeholder="Confirm Password" required></td>
                    </tr>
                    <tr>
                        <td>
                            <a
                                href="@if ($videos->role == true) {{ url('/mana_admin') }}
                        @else
                        {{ url('/mana_user') }} @endif
                            ">
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
