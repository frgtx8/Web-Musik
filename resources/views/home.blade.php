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
                    <div class="search">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Search Music">
                    </div>
                    <div class="user">
                        <img src="img/User.jpg" alt="User" title="Fadhil Rahman">
                    </div>
                </nav>
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
                        @foreach ($penyanyi as $item)
                        <li>
                            <img src="{{ $item->gambar }}" alt="Arijit Singh" title="{{ $item->nama_penyanyi }}">
                        </li>
                        @endforeach

                    </div>
                </div>
            </div>


            <div class="master_play">
                <div class="wave">
                    <div class="wave1"></div>
                    <div class="wave1"></div>
                    <div class="wave1"></div>
                </div>
                <img src="img/1.jpg" alt="Alan" id="album-art">
                <h5>On My Way <br>
                    <div class="subtitle">Alan Walker</div>
                </h5>
                <div class="icon">
                    <i class="bi bi-skip-start-fill" id="skip-start"></i>
                    <i class="bi bi-play-fill" id="play-pause"></i>
                    <i class="bi bi-skip-end-fill" id="skip-end"></i>
                </div>
                <span id="currentStart">0:00</span>
                <div class="bar">
                    <input type="range" id="seek" min="0" value="0" max="100">
                    <div class="bar2" id="bar2"></div>
                    <div class="dot" id="dot"></div>
                </div>
                <span id="currentEnd">0:00</span>

                <div class="vol">
                    <i class="bi bi-volume-down-fill"></i>
                    <input type="range" id="vol" min="0" value="30" max="100">
                    <div class="vol_bar"></div>
                    <div class="dot" id="vol_dot"></div>
                </div>

                <!-- Elemen audio -->
                <audio id="audio" src="{{ asset('music/Rayola - Sumpah Mainan Bibia (Official Music Video).mp3') }}" preload="auto"></audio>
            </div>

        </header>
            <script src="app.js"></script>
    </body>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const audio = document.getElementById('audio');
            const playPauseBtn = document.getElementById('play-pause');
            const skipStartBtn = document.getElementById('skip-start');
            const skipEndBtn = document.getElementById('skip-end');
            const seekBar = document.getElementById('seek');
            const currentStart = document.getElementById('currentStart');
            const currentEnd = document.getElementById('currentEnd');
            const volControl = document.getElementById('vol');
            const volDot = document.getElementById('vol_dot');
            const seekBar2 = document.getElementById('bar2');
            const dot = document.getElementById('dot');

            // Memutar atau menjeda lagu
            playPauseBtn.addEventListener('click', function() {
                if (audio.paused) {
                    audio.play();
                    playPauseBtn.classList.remove('bi-play-fill');
                    playPauseBtn.classList.add('bi-pause-fill');
                } else {
                    audio.pause();
                    playPauseBtn.classList.remove('bi-pause-fill');
                    playPauseBtn.classList.add('bi-play-fill');
                }
            });

            // Skip ke awal lagu
            skipStartBtn.addEventListener('click', function() {
                audio.currentTime = 0;
            });

            // Skip ke akhir lagu
            skipEndBtn.addEventListener('click', function() {
                audio.currentTime = audio.duration - 5;  // Skip 5 detik dari akhir
            });

            // Mengupdate progress bar saat musik diputar
            audio.addEventListener('timeupdate', function() {
                let progress = (audio.currentTime / audio.duration) * 100;
                seekBar.value = progress;
                seekBar2.style.width = progress + '%';
                dot.style.left = progress + '%';

                let minutesStart = Math.floor(audio.currentTime / 60);
                let secondsStart = Math.floor(audio.currentTime % 60);
                currentStart.textContent = `${minutesStart}:${secondsStart < 10 ? '0' : ''}${secondsStart}`;

                let minutesEnd = Math.floor(audio.duration / 60);
                let secondsEnd = Math.floor(audio.duration % 60);
                currentEnd.textContent = `${minutesEnd}:${secondsEnd < 10 ? '0' : ''}${secondsEnd}`;
            });

            // Menangani perubahan posisi seekbar
            seekBar.addEventListener('input', function() {
                let value = seekBar.value;
                audio.currentTime = (audio.duration / 100) * value;
            });

            // Mengatur volume
            volControl.addEventListener('input', function() {
                audio.volume = volControl.value / 100;
                volDot.style.left = volControl.value + '%';
            });
        });
    </script>


</html>
