window.playSpeak = function(text) {
    var confSpeak = new SpeechSynthesisUtterance(text);
    confSpeak.lang = 'pt-BR';
    window.speechSynthesis.speak(confSpeak);
}
