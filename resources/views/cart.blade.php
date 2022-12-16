@extends('layouts.app')

@section('content')
    <div class="welcome">
        @if (isset($usercart))
            @if ($usercart != '[]')
                <h2 class="welcome">Your cart</h2>
            @else
                <br>
                <h2 class="welcome">Nothing up here</h2>
            @endif
        @endif

    </div>
    <div class="container">
        <div class="main_top">
            @if (isset($usercart))
                @if ($usercart != '[]')
                    <table class="cart_tbl">
                        <tr class="cart_tr">
                            <th class="cart_td">Name</td>
                            <th class="cart_td">Author</td>
                            <th class="cart_td">Category</td>
                            <th class="cart_td" style="color:lightgreen">Price</td>
                        </tr>
                            <input type="hidden" name="{{ $sum = 0 }}">
                            @foreach ($usercart as $video)
                                <input type="hidden"
                                    name=" {{ $videos = DB::table('videos')->where('id', '=', "$video->vid")->get() }}">
                                @foreach ($videos as $videoa)
                                    <tr class="cart_tr">
                                        <td class="cart_td">{{ $videoa->name }}</td>

                                        <td class="cart_td">{{ $videoa->author }}</td>
                                        <td class="cart_td">{{ $videoa->category }}</td>
                                        <td class="cart_td" style="color:lightgreen">{{ $videoapr = 5 }}$</td>
                                        <td class="cart_td"><a href="{{ route('delSongCart', $videoa->id) }}"
                                                class="btn btn-secondary"><i class="bi bi-trash3"></i></a>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="{{ $sum += $videoapr }}">
                                @endforeach
                            @endforeach
                        <tr>
                            <td colspan="5">
                                <hr>
                            <td>
                        </tr>
                        <tr>
                            <td class="cart_td"></td>
                            <td class="cart_td"></td>
                            <th class="cart_td" style="color:aqua">Total</th>
                            <td class="cart_td" style="color:lightgreen">{{ $sum }}$</td>
                            <td class="cart_td"><a></a></td>
                        </tr>
                        <tr>
                            <td class="cart_td"></td>
                            <td class="cart_td"></td>
                            <td class="cart_td"></td>
                            <td class="cart_td">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Buy all</button>
                                    <input type="hidden" name="sum" value="{{ $sum }}">
                                    <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
                                </form>
                            </td>

                            <td class="cart_td"></td>
                        </tr>
                    </table>
                @endif
            @endif

        </div>
    </div>
    <div style="height: 410px">
        &nbsp;
    </div>
@endsection
