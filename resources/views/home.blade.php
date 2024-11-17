<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=sevice-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <title>MelodiFY</title>
    </head>

    <body>
        <header>
            <div class="menu_side">
                <h1>Playlist</h1>
                <div class="playlist">
                    <h4 class="active"><span></span><i class="bi bi-music-note-beamed"></i> Playlist</h4>
                    <h4 ><span></span><i class="bi bi-music-note-beamed"></i> Last Listening</h4>
                    <h4 ><span></span><i class="bi bi-music-note-beamed"></i> Recommended</h4>
                </div>
                <div class="menu_song">
                    @foreach ($penyanyi as $musik )

                    <li class="songItem">
                        <span class="d-flex">
                           <p class="mr-0">0</p> {{ $loop->iteration }}
                        </span>
                        <img src="{{ $musik->gambar }}" alt="Alan">
                        <h5>
                            @foreach ($musik->relasi as $penyanyirelasi)
                            {{ $penyanyirelasi->judul_lagu }}
                            @endforeach


                            <div class="subtitle">
                                {{ $musik->nama_penyanyi }}
                            </div>
                        </h5>
                            <i class="bi playListPlay bi-play-circle-fill" id="1"></i>
                    </li>
                    @endforeach
                </div>
            </div>


            <div class="song_side">
                <nav>
                    <ul>
                        <li>Discover <span></span></li>
                        <li>MY LIBRARY</li>
                        <li>RADIO</li>
                    </ul>
                    <div class="search">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Search Music">
                    </div>
                    <div class="user">
                        <img src="img/User.jpg" alt="User" title="Fadhil Rahman">
                    </div>
                </nav>
                <div class="content">
                    <h1>Alan Walker-Fade</h1>
                    <p>
                        You were the shadow to my light old you feel us Another start You fade
                        <br>
                        Away Afraid our aim is out of sight Wanna see us Alive
                    </p>
                    <div class="buttons">
                        <button>PLAY</button>
                        <button>FOLLOW</button>
                    </div>
                </div>
                <div class="popular_song">
                    <div class="h4">
                        <h4>Popular Song</h4>
                        <div class="btn_s">
                            <i id="left_scroll" class="bi bi-arrow-left-short"></i>
                            <i id="right_scroll" class="bi bi-arrow-right-short"></i>
                        </div>
                    </div>
                    <div class="pop_song">
                        @foreach ($penyanyi as $musik)
                        <li class="songItem">
                            <div class="img_play">
                                <img src="{{ $musik->gambar }}" alt="">
                                <i class="bi playListPlay bi-play-circle-fill" id="7"></i>
                            </div>
                            <h5> @foreach ($musik->relasi as $penyanyirelasi)
                            {{ $penyanyirelasi->judul_lagu }}
                            @endforeach
                                <br>
                                <div class="subtitle">
                                    {{ $musik->nama_penyanyi }}
                                </div>
                            </h5>
                        </li>
                        @endforeach

                    </div>
                </div>
                <div class="popular_artists">
                    <div class="h4">
                        <h4>Popular Artists</h4>
                        <div class="btn_s">
                            <i id="left_scrolls" class="bi bi-arrow-left-short"></i>
                            <i id="right_scrolls" class="bi bi-arrow-right-short"></i>
                        </div>
                    </div>
                    <div class="item">
                        <li>
                            <img src="img/arijit.jpg" alt="Arijit Singh" title="Arijit Singh">
                        </li>
                        <li>
                            <img src="img/rayola.jpg" alt="Rayola" title="Rayola">
                        </li>
                        <li>
                            <img src="img/afgan.jpg" alt="Afgan" title="Afgan">
                        </li>
                        <li>
                            <img src="img/david.jpg" alt="David Iztambul" title="David Iztambul">
                        </li>
                        <li>
                            <img src="img/ghoshal.jpg" alt="Shreya Ghoshal" title="Shreya Ghoshal">
                        </li>
                        <li>
                            <img src="img/isyana.jpg" alt="Isyana Sarasvati" title="Isyana Sarasvati">
                        </li>
                        <li>
                            <img src="img/jung kook.jpg" alt="Jeon Jung Kook" title="Jeon Jung Kook">
                        </li>
                        <li>
                            <img src="img/rossa.jpg" alt="Rossa" title="Rossa">
                        </li>
                        <li>
                            <img src="img/taylor.jpg" alt="Taylor Swift" title="Taylor Swift">
                        </li>
                        <li>
                            <img src="img/tulus.jpg" alt="Tulus" title="Tulus">
                        </li>
                        <li>
                            <img src="img/vidi.jpg" alt="Vidi Aldiano" title="Vidi Aldiano">
                        </li>
                    </div>
                </div>
            </div>


            <div class="master_play">
                <div class="wave">
                    <div class="wave1"></div>
                    <div class="wave1"></div>
                    <div class="wave1"></div>
                </div>
                <img src="img/1.jpg" alt="Alan">
                <h5>On My Way <br>
                    <div class="subtitle">Alan Walker</div>
                </h5>
                <div class="icon">
                    <i class="bi bi-skip-start-fill"></i>
                    <i class="bi bi-play-fill"></i>
                    <i class="bi bi-skip-end-fill"></i>
                </div>
                <span id="currentStart">0:00</span>
                <div class="bar">
                    <input type="range" id="seek" min="0" value="0" max="100">
                    <div class="bar2" id="bar2"></div>
                    <div class="dot"></div>
                </div>
                <span id="currentEnd">0:00</span>

                <div class="vol">
                    <i class="bi bi-volume-down-fill"></i>
                    <input type="range" id="vol" min="0" value="30" max="100">
                    <div class="vol_bar"></div>
                    <div class="dot" id="vol_dot"></div>
                </div>
            </div>
        </header>
            <script src="app.js"></script>
    </body>

</html>
