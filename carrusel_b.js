/*
  CarruselB
  Galeria d'imatges de tipus "slider" amb CSS principalment
  ProInf.net 2013-03-29
  Versi� 6
*/

// 1)
// El problema del CSS �s que en pr�mer el vincles queden en l'historial
// La soluci� �s utilitzar location.replace() del JavaScript
// En reempla�ar el vincle no queda a l'historial,
// i per tant el bot� enrere funciona a la primera

// 2)
// L'animaci� de transici� entre fotos la fa la fulla d'estils
// Per activar l'animaci� nom�s cal anar als vincles

// 3)
// Aquest JavaScript:
// evita utilitzar l'historial de navegaci�,
// temporitza el canvi entre fotos,
// i va a la primera foto al carregar la p�gina

function CarruselB(config)
{
  var index = 0;
  var links = []; // "#foto1", "#foto2", etc.
  var timer = null;






  function init() {
    setup();
    parseLinks();
    changePhoto(links[0]);
    wait();
  }









  function setup() {
    var byDefault = function(key, value) {
      if (config[key] == undefined) config[key] = value;
    };
    config = config || {};
    byDefault('id', "carrusel_b");
    byDefault('waiting', 7000); // millisegons (false per desactivar)
  }









  function parseLinks() {
    var aTags = getTags("a");
    for (var i=0; i<aTags.length; i++) {
      links.push(getHash(aTags[i])); // obtenir tots els href dels enlla�os
      aTags[i].onclick = clickLink; // afegir onclick als enlla�os
    }
  }









  function getTags(tagName) {
    var container = document.getElementById(config.id);
    if (container == null) {
      alert('CarruselB: No trobo el contenidor');
      return [];
    }
    return container.getElementsByTagName(tagName);
  }









  function clickLink(event) {
    var aTag = event.target;
    changePhoto(getHash(aTag));
    restart();
    return false; // Desactiva l'atribut href
  }







  function getHash(aTag) {
    return '#'+aTag.href.split('#')[1]; // "#foto1"
  }








  function changePhoto(hash) {
    location.replace(hash); // No afegeix a l'historial del navegador
    currentLink(hash);
    index = links.indexOf(hash);
  }








  function currentLink(hash) { // Posa la classe "current" al vincle actual
    var aTags = getTags("a");
    for (var i=0; i<aTags.length; i++) {
      var aTag = aTags[i];
      aTag.className = (hash == getHash(aTag))? 'current':'';
    }
  }










  function restart() { // Reinicia l'espera
    if (timer != null) {
      clearTimeout(timer);
      wait();
    }
  }








  function wait() {
    if (config.waiting) {
      timer = setTimeout(automatic, config.waiting);
    }
  }











  function automatic(){
    index = (index+1) % links.length;
    changePhoto(links[index]);
    wait();
  }

  init();
}











