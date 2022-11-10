@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main_top">
            <h1 class="welcome">
                Welcome!
            </h1>

            <div class="card_list">
                <table class="card_table">
                    <tr>
                        <td>
                            <a class="card_link" href="#">
                                <div class="card_single">
                                    <div>
                                        <img class="card_img"
                                            src="https://i.scdn.co/image/ab6761610000e5eb4e2e2c78de847c4d9b12d32f"
                                            alt="...">
                                    </div>
                                    <div class="card_des">
                                        <h5>That's Hilarious</h5>
                                        <p style="margin: 0">Charlie Puth</p>
                                    </div>
                                    <div class="card_play">
                                        <i class="bi bi-play-circle"></i>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <div class="card_single">
                                <div>
                                    <img class="card_img"
                                        src="https://www.songwriteruniverse.com/wp/wp-content/uploads/2022/09/nicky-youre-330-1.jpg"
                                        alt="...">
                                </div>
                                <div class="card_des">
                                    <h5>Sunroof</h5>
                                    <p style="margin: 0">Nicky Youre</p>
                                </div>
                                <div class="card_play">
                                    <i class="bi bi-play-circle"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card_single">
                                <div>
                                    <img class="card_img"
                                        src="https://media.allure.com/photos/6309112ecf95b97d57f0e1f9/1:1/w_1723,h_1723,c_limit/Lil%20Nas%20X%20YSL.jpg"
                                        alt="...">
                                </div>
                                <div class="card_des">
                                    <h5>Star Walkin'</h5>
                                    <p style="margin: 0">Lil Nas X</p>
                                </div>
                                <div class="card_play">
                                    <i class="bi bi-play-circle"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="card_single">
                                <div>
                                    <img class="card_img"
                                        src="https://pbs.twimg.com/profile_images/1565372635302825989/jMekyLHj_400x400.jpg"
                                        alt="...">
                                </div>
                                <div class="card_des">
                                    <h5>2002</h5>
                                    <p style="margin: 0">Anne Marie</p>
                                </div>
                                <div class="card_play">
                                    <i class="bi bi-play-circle"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="height: 270px">
            &nbsp;
        </div>
    </div>
@endsection
