var accueilMusic = new Howl({
    src:['../assets/son_musique/musique/musique_accueil.ogg'],
    loop: true,
    volume : 0.5
});

$(function(){
    accueilMusic.play();
});


