@extends('layouts.app')
@section('content')
    <div style="height: 50px">
        &nbsp;
    </div>
    @if (isset($mes))
        <div>
            <h2 class="welcome">{{ $mes }}</h2>
        </div>
    @endif

    <table class="cart_tbl">
        <tr>
            <td class="card_td">
                <form action="{{ route('ticketPlus') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="ticketCard">
                        <div class="ticketImg"><i class="bi bi-ticket-perforated"></i></div>
                        <div class="ticketDes">10 <i class="bi bi-ticket-perforated"></i> </div>
                        <input type="hidden" name="ticket" value="10">
                        <div class="ticketPrice">1$</div>
                        <input type="hidden" name="usd" value="1">
                    </button>
                </form>
            </td>
            <td class="card_td">
                <form action="{{ route('ticketPlus') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="ticketCard">
                        <div class="ticketImg"><i class="bi bi-ticket-perforated"></i></div>
                        <div class="ticketDes">20 <i class="bi bi-ticket-perforated"></i> </div>
                        <br>
                        <input type="hidden" name="ticket" value="20">
                        <div class="ticketPrice">2$</div>
                        <input type="hidden" name="usd" value="2">
                    </button>
                </form>
            </td>
            <td class="card_td">
                <form action="{{ route('ticketPlus') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="ticketCard">
                        <div class="ticketImg"><i class="bi bi-ticket-perforated"></i></div>
                        <div class="ticketDes">30 <i class="bi bi-ticket-perforated"></i> </div>
                        <input type="hidden" name="ticket" value="30">
                        <div class="ticketPrice">2.5$</div>
                        <input type="hidden" name="usd" value="2.5">
                    </button>
                </form>
            </td>
        </tr>
        <tr>
            <td class="card_td">
                <form action="{{ route('usdPlus') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="usdCard">
                        <div class="usdImg"><i class="bi bi-currency-dollar"></i></div>
                        <div class="usdDes">10 <i class="bi bi-currency-dollar"></i></div>
                        <input type="hidden" name="usd" value="10">
                        <div class="usdPrice">&nbsp;</div>
                        <input type="hidden" name="ticket" value="0">
                    </button>
                </form>
            </td>
            <td class="card_td">
                <form action="{{ route('usdPlus') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="usdCard">
                        <div class="usdImg"><i class="bi bi-currency-dollar"></i></div>
                        <div class="usdDes">20 <i class="bi bi-currency-dollar"></i></div>
                        <input type="hidden" name="usd" value="20">
                        <div class="usdPrice">&nbsp;</div>
                        <input type="hidden" name="ticket" value="0">
                    </button>
                </form>
            </td>
            <td class="card_td">
                <form action="{{ route('usdPlus') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="usdCard">
                        <div class="usdImg"><i class="bi bi-currency-dollar"></i></div>
                        <div class="usdDes">30 <i class="bi bi-currency-dollar"></i></div>
                        <input type="hidden" name="usd" value="30">
                        <div class="usdPrice">&nbsp;</div>
                        <input type="hidden" name="ticket" value="0">
                    </button>
                </form>
            </td>
        </tr>
    </table>
    <div style="height: 250px">
        &nbsp;
    </div>
@endsection
