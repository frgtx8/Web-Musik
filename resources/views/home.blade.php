<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=sevice-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <title>MelodiFY</title>
        <style>

.user-dropdown {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

.user-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 45px;
    right: 0;
    background-color: #383d49;
    border: 1px solid #ddd;
    padding: 10px;
    min-width: 150px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1;
}

.dropdown-content p {
    margin: 0;
    font-size: 14px;
    color: #;
}

.logout-btn {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    width: 100%;
    text-align: center;
    font-size: 14px;
}

.logout-btn:hover {
    background-color: #d32f2f;
}

        </style>
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


                            <div class="subtitle">
                                {{ $musik->nama_penyanyi }}
                            </div>
                        </h5>
                            <i class="bi playListPlay bi-play-circle-fill" id="play-{{ $loop->parent->iteration }}-{{ $loop->iteration }}"
                                data-song="{{ asset($penyanyirelasi->file_path) }}"
                                data-title="{{ $penyanyirelasi->judul_lagu }}"
                                data-artist="{{ $musik->nama_penyanyi }}"
                                data-image="{{ $musik->gambar }}"></i>
                    </li>
                    @endforeach
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
                        <img src="{{ Auth::user()->foto ? asset('storage/img/' . Auth::user()->foto) : 'img/User.jpg' }}" alt="User" title="{{ Auth::user()->name }}" class="user-img" id="userImg" >
                        <div class="dropdown-content">
                            <p>{{ Auth::user()->name }}</p>
                            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-btn">Logout</button>
                            </form>
                        </div>
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
                        @foreach ($musik->relasi as $lagu)
                        <li class="songItem">
                            <div class="img_play">
                                <img src="{{ $musik->gambar }}" alt="Album Art">
                                <i class="bi playListPlay bi-play-circle-fill" id="play-{{ $loop->parent->iteration }}-{{ $loop->iteration }}"
                                   data-song="{{ asset($lagu->file_path) }}"
                                   data-title="{{ $lagu->judul_lagu }}"
                                   data-artist="{{ $musik->nama_penyanyi }}"
                                   data-image="{{ $musik->gambar }}"></i>
                            </div>
                            <h5>
                                {{ $lagu->judul_lagu }}
                                <br>
                                <div class="subtitle">
                                    {{ $musik->nama_penyanyi }}
                                </div>
                            </h5>
                        </li>
                        @endforeach
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
                <img src="/img/1.jpg" alt="Alan" id="album-art">
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
                    <div class="vol_bar" id="vol_bar"></div>
                    <div class="dot" id="vol_dot"></div>
                </div>

                <!-- Elemen audio -->
                <audio id="audio" src="{{ asset('music/Alan Walker Sabrina Carpenter & Farruko - On My Way.mp3') }}" preload="auto"></audio>
            </div>

        </header>
            {{--  <script src="app.js"></script>  --}}
    </body>

    <script>
        // Toggle dropdown visibility
        document.getElementById('userImg').addEventListener('click', function () {
            const dropdown = document.querySelector('.dropdown-content');
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        });

        // Optional: Hide dropdown when clicked outside
        window.addEventListener('click', function (e) {
            const dropdown = document.querySelector('.dropdown-content');
            const userImg = document.getElementById('userImg');
            if (!userImg.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const audio = document.getElementById('audio');
            const albumArt = document.getElementById('album-art');
            const titleDisplay = document.querySelector('.master_play h5');
            const playButtons = document.querySelectorAll('.playListPlay');
            const seekBar = document.getElementById('seek'); // Progress bar
            const currentStart = document.getElementById('currentStart'); // Current time display
            const currentEnd = document.getElementById('currentEnd'); // Total time display
            const bar2 = document.getElementById('bar2'); // Bar element
            const dot = document.getElementById('dot'); // Dot element
            const volControl = document.getElementById('vol'); // Volume control slider
            const volBar = document.querySelector('.vol_bar'); // Volume bar element
            const volDot = document.getElementById('vol_dot'); // Volume dot element

            // Play button logic
            playButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const songPath = this.dataset.song;
                    const songTitle = this.dataset.title;
                    const songArtist = this.dataset.artist;
                    const songImage = this.dataset.image;

                    // Stop current audio and load new song
                    audio.pause();
                    audio.src = songPath;
                    audio.load();
                    audio.play();

                    // Update UI
                    titleDisplay.innerHTML = `${songTitle} <br><div class="subtitle">${songArtist}</div>`;
                    albumArt.src = songImage;

                    // Change play button icon
                    playPauseBtn.classList.remove('bi-play-fill');
                    playPauseBtn.classList.add('bi-pause-fill');
                });
            });

            // Play/Pause button functionality


            // Update progress bar and current time display
            audio.addEventListener('timeupdate', function () {
                const currentTime = audio.currentTime;
                const duration = audio.duration;

                // Update the seek bar value
                const progress = (currentTime / duration) * 100;
                seekBar.value = progress;

                // Update the bar2 width and dot position without transition
                bar2.style.width = `${progress}%`; // Update the bar2 width
                dot.style.left = `${progress}%`; // Move the dot immediately

                // Update current time display (00:00 format)
                const currentMinutes = Math.floor(currentTime / 60);
                const currentSeconds = Math.floor(currentTime % 60);
                currentStart.textContent = `${currentMinutes}:${currentSeconds < 10 ? '0' + currentSeconds : currentSeconds}`;

                // Update total time display (00:00 format)
                const durationMinutes = Math.floor(duration / 60);
                const durationSeconds = Math.floor(duration % 60);
                currentEnd.textContent = `${durationMinutes}:${durationSeconds < 10 ? '0' + durationSeconds : durationSeconds}`;
            });

            // Allow user to manually change progress via seek bar
            seekBar.addEventListener('input', function () {
                const seekTime = (seekBar.value / 100) * audio.duration;
                audio.currentTime = seekTime;

                // Directly update the dot position without any transition
                dot.style.left = `${seekBar.value}%`; // Directly update the dot position
            });

            // Volume control: Update volume and the volume bar
            volControl.addEventListener('input', function () {
                const volumeValue = volControl.value;

                // Update the audio volume
                audio.volume = volumeValue / 100;

                // Update the volume bar width and position of the dot
                volBar.style.width = `${volumeValue}%`; // Update volume bar width
                volDot.style.left = `${volumeValue}%`; // Move the volume dot
            });

            // Volume control: Set initial values for the volume bar and dot
            const initialVolume = volControl.value;
            volBar.style.width = `${initialVolume}%`;
            volDot.style.left = `${initialVolume}%`;
        });

    </script>

    <script>



    </script>

    <script>
        const playlist = {!! json_encode($penyanyi->map(function ($penyanyi) {
            // Pastikan relasi relasi tidak null
            return $penyanyi->relasi ? $penyanyi->relasi->map(function ($musicItem) use ($penyanyi) {
                return [
                    'songPath' => $musicItem->file_path,  // Mengambil file_path dari relasi Music
                    'title' => $musicItem->judul_lagu,    // Mengambil judul_lagu dari Music
                    'artist' => $penyanyi->nama_penyanyi, // Mengambil nama_penyanyi dari Penyanyi
                    'albumArt' => $penyanyi->gambar       // Mengambil gambar dari Penyanyi
                ];
            }) : [];
        })) !!};
        console.log("playlist",playlist)

        document.addEventListener('DOMContentLoaded', function () {
            const audio = document.getElementById('audio');
            const playPauseBtn = document.getElementById('play-pause');
            const albumArt = document.getElementById('album-art');
            const titleDisplay = document.querySelector('.master_play h5');
            const skipStartBtn = document.getElementById('skip-start');
            const skipEndBtn = document.getElementById('skip-end');

            let currentSongIndex = 0;

            if (!playlist || playlist.length === 0) {
                console.error('Playlist kosong atau undefined');
                return;
            }

            function playSong(songIndex) {
                const song = playlist[songIndex][0];

                if (song && song.songPath && song.title && song.artist && song.albumArt) {
                    audio.src = song.songPath;
                    titleDisplay.innerHTML = `${song.title} <br><div class="subtitle">${song.artist}</div>`;
                    albumArt.src = song.albumArt;
                    audio.play();
                    playPauseBtn.classList.remove('bi-play-fill');
                    playPauseBtn.classList.add('bi-pause-fill');
                } else {
                    console.error("Data lagu tidak lengkap untuk indeks:", songIndex);
                }
            }


            // Tombol Play/Pause
            playPauseBtn.addEventListener('click', function () {
                if (audio.paused) {
                    audio.play();
                    this.classList.remove('bi-play-fill');
                    this.classList.add('bi-pause-fill');
                } else {
                    audio.pause();
                    this.classList.remove('bi-pause-fill');
                    this.classList.add('bi-play-fill');
                }
            });

            // Tombol Skip Start (Lagu Sebelumnya)
            skipStartBtn.addEventListener('click', function () {
                currentSongIndex = (currentSongIndex - 1 + playlist.length) % playlist.length; // Looping ke lagu terakhir jika berada di awal
                console.log("Prev Song Index:", currentSongIndex); // Debugging: Periksa indeks
                playSong(currentSongIndex);
            });

            // Tombol Skip End (Lagu Berikutnya)
            skipEndBtn.addEventListener('click', function () {
                currentSongIndex = (currentSongIndex + 1) % playlist.length; // Looping ke lagu pertama jika berada di akhir
                console.log("Next Song Index:", currentSongIndex); // Debugging: Periksa indeks
                playSong(currentSongIndex);
            });

            // Mulai memutar lagu pertama saat halaman dimuat
            playSong(currentSongIndex);
        });


    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const audio = document.getElementById('audio');
            const volControl = document.getElementById('vol'); // Volume control slider
            const volBar = document.querySelector('.vol_bar'); // Volume bar element
            const volDot = document.getElementById('vol_dot'); // Volume dot element
            const volIcon = document.querySelector('.bi-volume-down-fill'); // Volume icon

            // Volume control: Update volume and the volume bar
            volControl.addEventListener('input', function () {
                const volumeValue = volControl.value;

                // Update the audio volume
                audio.volume = volumeValue / 100;

                // Update the volume bar width and position of the dot
                volBar.style.width = `${volumeValue}%`; // Update volume bar width
                volDot.style.left = `${volumeValue}%`; // Move the volume dot

                // Update the volume icon based on volume level
                updateVolumeIcon(volumeValue);
            });

            // Volume control: Set initial values for the volume bar and dot
            const initialVolume = volControl.value;
            volBar.style.width = `${initialVolume}%`;
            volDot.style.left = `${initialVolume}%`;
            updateVolumeIcon(initialVolume);

            function updateVolumeIcon(volumeValue) {
                const icon = volIcon;

                // Set the appropriate icon based on the volume level
                if (volumeValue === "0") {
                    icon.classList.remove('bi-volume-down-fill', 'bi-volume-up-fill', 'bi-volume-mute-fill');
                    icon.classList.add('bi-volume-mute-fill');
                } else if (volumeValue <= 50) {
                    icon.classList.remove('bi-volume-up-fill', 'bi-volume-mute-fill');
                    icon.classList.add('bi-volume-down-fill'); // One arc (low volume)
                } else {
                    icon.classList.remove('bi-volume-down-fill', 'bi-volume-mute-fill');
                    icon.classList.add('bi-volume-up-fill'); // Three arcs (high volume)
                }
            }
        });

    </script>
    <script>
    playlistButtons.forEach((button) => {
        button.addEventListener('click', function () {
            // Reset semua tombol playListPlay
            playlistButtons.forEach(btn => btn.classList.remove('bi-pause-circle-fill'));
            playlistButtons.forEach(btn => btn.classList.add('bi-play-circle-fill'));

            // Ganti ikon tombol yang diklik
            this.classList.remove('bi-play-circle-fill');
            this.classList.add('bi-pause-circle-fill');
        });
    });

    </script>

</html>
