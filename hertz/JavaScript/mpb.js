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
'Chico Buarque': [
    { title: "Cálice", src: "msc/mpb/chico/Cálice.mp3", duration: "6:25", album: "Meus Caros Amigos (1976)" }
],

'Rita Lee': [
    { title: "Lança Perfume", src: "msc/mpb/ritalee/Rita Lee - Lança Perfume (1980).mp3", duration: "3:34", album: "Rita Lee (1980)" }
],

'Zé Ramalho': [
    { title: "Sinônimos (Ao Vivo)", src: "msc/mpb/ramalho/Zé Ramalho - Sinônimos (Ao Vivo 2005) (Clipe Oficial).mp3", duration: "3:56", album: "Zé Ramalho Ao Vivo (2005)" }
],

'Gal Costa': [
    { title: "Desafinado", src: "msc/mpb/gal/Gal Costa - Desafinado.mp3", duration: "3:27", album: "Gal Costa Canta Tom Jobim (1999)" }
],

'Jorge Ben Jor': [
    { title: "País Tropical", src: "msc/mpb/jorge/Jorge Ben Jor - País Tropical.mp3", duration: "2:41", album: "O Bidú – Silêncio no Brooklin (1969)" }
],

'Elis & Tom': [
    { title: "Águas de Março", src: "msc/mpb/elisetom/Elis Regina & Tom Jobim -  _Aguas de Março_ - 1974.mp3", duration: "3:32", album: "Elis & Tom (1974)" }
],

'Maria Bethânia': [
    { title: "As Canções Que Você Fez Para Mim (Ao Vivo)", src: "msc/mpb/maria/Maria Bethânia - _As Canções Que Você Fez Para Mim_ - Noite Luzidia (Ao Vivo).mp3", duration: "3:12", album: "Noite Luzidia - Ao Vivo (2001)" }
],

'Djavan': [
    { title: "Samurai (ft. Stevie Wonder)", src: "msc/mpb/djavan/Djavan - Samurai (Áudio Oficial) ft. Stevie Wonder.mp3", duration: "3:55", album: "Luz (1982)" }
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