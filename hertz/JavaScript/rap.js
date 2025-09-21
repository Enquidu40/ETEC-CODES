// Player de Rap
document.addEventListener('DOMContentLoaded', function() {
    const audioPlayer = document.getElementById('audio-player');
    const playBtn = document.getElementById('play-btn');
    const pauseBtn = document.getElementById('pause-btn');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const progress = document.getElementById('progress');
    const currentTimeDisplay = document.getElementById('current-time');
    const totalTimeDisplay = document.getElementById('total-time');
    const currentSongDisplay = document.querySelector('.current-song');
    const playlist = document.querySelector('.playlist');
    const albumCover = document.getElementById('album-cover');
    
    // Dados completos dos artistas e músicas
    const artists = {
        'Eminem': [
            { title: "Eminem - The Real Slim Shady (Official Video - Clean Version)", src: "msc/rap/em/Eminem - The Real Slim Shady (Official Video - Clean Version).mp3", duration: "4:28", album: "The Marshall Mathers LP (2000)" },
            { title: "Eminem - Without Me (Official Music Video)", src: "msc/rap/em/Eminem - Without Me (Official Music Video).mp3", duration: "4:50", album: "The Eminem Show (2002)" },
            { title: "Eminem - Rap God (Explicit)", src: "msc/rap/em/Eminem - Rap God (Explicit).mp3", duration: "6:04", album: "The Marshall Mathers LP 2 (2013)" },
            { title: "Eminem - Houdini (Official Music Video)", src: "msc/rap/em/Eminem - Houdini (Official Music Video).mp3", duration: "3:15", album: "The Death of Slim Shady (2024)" },
            { title: "Eminem - When I'm Gone (Official Music Video)", src: "msc/rap/em/Eminem - When I'm Gone (Official Music Video).mp3", duration: "4:41", album: "Curtain Call: The Hits (2005)" },
            { title: "Eminem - No Love (Explicit Version) ft. Lil Wayne", src: "msc/rap/em/Eminem - No Love (Explicit Version) ft. Lil Wayne.mp3", duration: "5:00", album: "Recovery (2010)" },
            { title: "Eminem - Sing For The Moment (Official Music Video)", src: "msc/rap/em/Eminem - Sing For The Moment (Official Music Video).mp3", duration: "5:39", album: "The Eminem Show (2002)" },
            { title: "Eminem - Love The Way You Lie ft. Rihanna", src: "msc/rap/em/Eminem - Love The Way You Lie ft. Rihanna.mp3", duration: "4:26", album: "Recovery (2010)" }
        ],

        'Dalsin': [
            { title: "Dalsin - Parabellum (GioProd) [VideoClipe Oficial]", src: "msc/rap/dalsin/Dalsin - _Parabellum_ (GioProd) [VideoClipe Oficial].mp3", duration: "2:13", album: "Azul Piscina" },
            { title: "Dalsin - HOLLYWEED (GioProd)", src: "msc/rap/dalsin/Dalsin - HOLLYWEED (GioProd).mp3", duration: "4:14", album: "Azul Piscina"},
            { title: "Dalsin - Pesadelos de Quem Não Dorme Há Dias [Prod. Lorens]", src: "msc/rap/dalsin/Dalsin - Pesadelos de Quem Não Dorme Há Dias [Prod. Lorens].mp3", duration: "2:26", album: "Azul Piscina" },
            { title: "Dalsin - Yélasdiz (Vídeo Clipe Oficial)", src: "msc/rap/dalsin/Dalsin - Yélasdiz (Vídeo Clipe Oficial).mp3", duration: "2:57", album: "Sem álbum" }
        ],

        'Tupac Shakur': [
            {title: "Hit 'Em Up (Dirty) (Music Video) HD", src: "msc/rap/tupac/2Pac - Hit 'Em Up (Dirty) (Music Video) HD", duration: "5:12", album: "Greatest Hits"},
            {title: "All Eyez On Me", src: "msc/rap/tupac/2Pac - All Eyez On Me.mp3", duration: "5:08", album: "All Eyez On Me (1996)"},
            {title: "Ambitionz Az a Ridah", src: "msc/rap/tupac/2Pac - Ambitionz Az a Ridah.mp3", duration: "4:39", album: "All Eyez On Me (1996)"},
            {title: "Ratha Be Ya N****", src: "msc/rap/tupac/2Pac - Ratha Be Ya N____.mp3", duration: "4:15", album: "All Eyez On Me (1996)"},
            {title: "2 Of Amerikaz Most Wanted (feat. Snoop Dogg)", src: "msc/rap/tupac/2Pac - 2 Of Amerikaz Most Wanted (feat. Snoop Dogg).mp3", duration: "4:06", album: "All Eyez On Me (1996)"},
            {title: "Can't C Me", src: "msc/rap/tupac/2Pac - Can't C Me.mp3", duration: "5:00", album: "All Eyez On Me (1996)"},
            {title: "All About U (Dirty) (Music Video)", src: "msc/rap/tupac/2Pac - All About U (Dirty) (Music Video) HD.mp3", duration: "4:37", album: "All Eyez On Me (1996)"},
            {title: "No More Pain", src: "msc/rap/tupac/No More Pain.mp3", duration: "6:14", album: "All Eyez On Me (1996)"}
        ],

        'Racionais MC"s': [
            { title: "A vida É Desafio - Nada Como Um Dia Após O Outro Dia", src: "msc/rap/racionais/A vida É Desafio - Nada Como Um Dia Após O Outro Dia (Chora Agora).mp3", duration: "7:14", album: "Chora Agora" },
            { title: "Vida Loka Parte 2 - Nada Como Um Dia Após O Outro Dia", src: "msc/rap/racionais/Vida Loka Parte 2 - Nada Como Um Dia Após O Outro Dia (Ri Depois).mp3", duration: "5:51", album: "Ri Depois" },
            { title: "Eu sou 157 - Nada Como Um Dia Após O Outro Dia", src: "msc/rap/racionais/Eu sou 157 - Nada Como Um Dia Após O Outro Dia (Chora Agora).mp3", duration: "8:51", album: "Chora Agora" },
            { title: "Racionais - Sobrevivendo no Inferno -  Capítulo 4 Versículo 3", src: "msc/rap/racionais/Racionais - Sobrevivendo no Inferno -  Capítulo 4 Versículo 3.mp3", duration: "8:08", album: "Diário de um detento" }
        ],

        'Dr.Dree': [
            { title: "Dr. Dre - Still D.R.E. ft. Snoop Dogg", src: "msc/rap/dree/Dr. Dre - Still D.R.E. ft. Snoop Dogg.mp3", duration: "4:50", album: "Dr. Dre - '2001'" },
        ],
        'Snoop Dogg': [
            { title: "Snoop Dogg - Drop It Like It's Hot (Official Music Video) ft. Pharrell Williams", src: "/msc/rap/snoop/Snoop Dogg - Drop It Like It's Hot (Official Music Video) ft. Pharrell Williams.mp3", duration: "4:23", album: "R&G (Rhythm & Gangsta): The Masterpiece" },
        ],
        'Jay-Z': [
            { title: "JAY-Z - Young Forever ft. Mr Hudson", src: "msc/rap/jayz/JAY-Z - Young Forever ft. Mr Hudson.mp3", duration: "5:35", album: "The Blueprint3" },
        ],
        'Coolio': [
            { title: "Coolio - Gangsta's Paradise (feat. L.V.) [Videoclipe]", src: "msc/rap/coolio/Coolio - Gangsta's Paradise (feat. L.V.) [Official Music Video].mp3", duration: "4:16", album: "Gangsta's Paradise" },
        ]
    };
    
    let currentSongIndex = 0;
    let currentArtist = null;
    let currentSongs = [];
    
    // Função para carregar as músicas de um artista
    function loadArtistSongs(artistName) {
        currentArtist = artistName;
        currentSongs = artists[artistName] || [];
        currentSongIndex = 0;
        
        // Atualiza a playlist
        updatePlaylist();
        
        // Se houver músicas, carrega a primeira
        if (currentSongs.length > 0) {
            loadSong(currentSongIndex);
        } else {
            currentSongDisplay.textContent = "Nenhuma música disponível para " + artistName;
            albumCover.src = "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80";
            totalTimeDisplay.textContent = "0:00";
            currentTimeDisplay.textContent = "0:00";
            progress.value = 0;
        }
    }
    
    // Função para atualizar a lista de músicas
    function updatePlaylist() {
        playlist.innerHTML = '';
        
        if (currentSongs.length === 0) {
            const li = document.createElement('li');
            li.textContent = "Nenhuma música disponível";
            playlist.appendChild(li);
            return;
        }
        
        currentSongs.forEach((song, index) => {
            const li = document.createElement('li');
            li.dataset.index = index;
            
            const songInfo = document.createElement('div');
            songInfo.className = 'song-info';
            
            const songTitle = document.createElement('div');
            songTitle.className = 'song-title';
            songTitle.textContent = song.title;
            
            const songAlbum = document.createElement('div');
            songAlbum.className = 'song-duration';
            songAlbum.textContent = song.album;
            
            songInfo.appendChild(songTitle);
            songInfo.appendChild(songAlbum);
            
            const songDuration = document.createElement('div');
            songDuration.className = 'song-duration';
            songDuration.textContent = song.duration;
            
            li.appendChild(songInfo);
            li.appendChild(songDuration);
            
            li.addEventListener('click', () => {
                currentSongIndex = index;
                loadSong(currentSongIndex);
                audioPlayer.play();
            });
            
            playlist.appendChild(li);
        });
    }
    
    // Função para carregar uma música específica
    function loadSong(index) {
        if (currentSongs.length === 0 || index < 0 || index >= currentSongs.length) return;
        
        const song = currentSongs[index];
        audioPlayer.src = song.src;
        currentSongDisplay.textContent = `${currentArtist} - ${song.title}`;
        albumCover.src = "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80";
        totalTimeDisplay.textContent = song.duration;
        currentTimeDisplay.textContent = "0:00";
        progress.value = 0;
        
        // Atualiza a classe 'playing' na playlist
        const playlistItems = playlist.querySelectorAll('li');
        playlistItems.forEach((item, i) => {
            if (i === index) {
                item.classList.add('playing');
            } else {
                item.classList.remove('playing');
            }
        });
    }
    
    // Função para formatar o tempo
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs < 10 ? '0' : ''}${secs}`;
    }
    
    // Função para atualizar a barra de progresso
    function updateProgress() {
        const { currentTime, duration } = audioPlayer;
        if (duration) {
            const progressPercent = (currentTime / duration) * 100;
            progress.value = progressPercent;
            currentTimeDisplay.textContent = formatTime(currentTime);
        }
    }
    
    // Event listeners
    playBtn.addEventListener('click', () => {
        if (currentSongs.length > 0) {
            audioPlayer.play();
        }
    });
    
    pauseBtn.addEventListener('click', () => {
        audioPlayer.pause();
    });
    
    prevBtn.addEventListener('click', () => {
        if (currentSongs.length === 0) return;
        
        currentSongIndex--;
        if (currentSongIndex < 0) {
            currentSongIndex = currentSongs.length - 1;
        }
        loadSong(currentSongIndex);
        audioPlayer.play();
    });
    
    nextBtn.addEventListener('click', () => {
        if (currentSongs.length === 0) return;
        
        currentSongIndex++;
        if (currentSongIndex > currentSongs.length - 1) {
            currentSongIndex = 0;
        }
        loadSong(currentSongIndex);
        audioPlayer.play();
    });
    
    progress.addEventListener('click', (e) => {
        const width = progress.clientWidth;
        const clickX = e.offsetX;
        const duration = audioPlayer.duration;
        audioPlayer.currentTime = (clickX / width) * duration;
    });
    
    audioPlayer.addEventListener('timeupdate', updateProgress);
    audioPlayer.addEventListener('ended', () => {
        nextBtn.click();
    });
    
    // Adiciona evento de clique nos artistas para carregar suas músicas
    document.querySelectorAll('.artist-box').forEach(box => {
        box.addEventListener('click', function() {
            const artistName = this.querySelector('h3').textContent;
            loadArtistSongs(artistName);
        });
    });
    
    // Inicializa com nenhuma música selecionada
    currentSongDisplay.textContent = "Selecione um artista";
});