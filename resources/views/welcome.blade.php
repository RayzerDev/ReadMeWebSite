<x-layout>
    @section('title')
        Accueil
    @endsection

<div class="grandcarou">

<h1>Vos coups de coeur</h1>

<img class='souligne' src="{{url('storage\images\Vector 7.png')}}">



<div class="carousel-container">
  <div class="carousel">
      @foreach($histoireAccueil as $h)
          <div class="slide" id="slide1">
              <img src="{{$h->photo}}" alt="Image 1" style="width: 350px">
              <div class="caption">
                  <h2>{{$h->titre}}</h2>
                  <p>{{$h->pitch}}</p>
              </div>
          </div>
      @endforeach
  </div>
  <button class="prev" onclick="changeSlide(-1)">&#8249;</button>
  <button class="next" onclick="changeSlide(1)">&#8250;</button>
</div>


<div class="etoiles">

<span class="material-symbols-outlined">
star
</span>
<span class="material-symbols-outlined">
star
</span>
<span class="material-symbols-outlined">
star
</span>
<span class="material-symbols-outlined">
star
</span>
<span class="material-symbols-outlined">
star
</span>
</div>




<a href=""><button class="butonindex2">Tenter l'exprience</button></a>

<h1>Créez votre propre histoire</h1>

<img class='souligne' src="{{url('storage\images\Vector 7.png')}}">



<div class="grandedivflexindex">


    <div class="noto">
    <span id="colorflex" class="material-symbols-outlined">
grade
</span>
      <h1>Notoriété</h1>
      <p>Fais toi connaître <br> grâce à tes écrits !</p>
    </div>


    <div class="perso">
    <span id="colorflex" class="material-symbols-outlined">
person
</span>
    <h1>Personnages</h1>
      <p>Créer des <br> personnages unique.</p>
      </div>


      <div class="livre">
      <span id="colorflex" class="material-symbols-outlined">
auto_stories
</span>
         <h1>Style</h1>
      <p>Dans le style que <br>tu veux.</p>
      </div>
  
  
</div>
    <a href=""><button class="butonindex2">Tenter l'exprience</button></a>





</div><div class="videoroman">

<h1>Interviews de l'auteur de ...</h1>





<video class="videoindex" controls width="550" height="325">
  <source src="/media/cc0-videos/flower.webm" type="video/webm" />

  <source src="/media/cc0-videos/flower.mp4" type="video/mp4" />

  Download the
  <a href="/media/cc0-videos/flower.webm">WEBM</a>
  or
  <a href="/media/cc0-videos/flower.mp4">MP4</a>
  video.
</video>

<a href=""><button class="butonindex4">Voir le roman</button></a>



</div>

<div class="typehistoire">


<h1>Quel type d'histoire</h1>

<img class='souligne' src="{{url('storage\images\Vector 7.png')}}">



<div class="tags">

<div class="tagsbtn">Policier</div>

<div class="tagsbtn">Romantique</div>

<div class="tagsbtn">Science fiction</div>

<div class="tagsbtn">Fantastique</div>



</div>

<div class="tags">

<div class="tagsbtn">Aventure</div>

<div class="tagsbtn">Psychologique</div>

<div class="tagsbtn">Horreur</div>

<div class="tagsbtn">Réaliste</div>



</div>

</div>

<footer>
    <div>
        <h2>Pages</h2>
        <a href="">Accueil</a>
        <a href="">Thèmes</a>
        <a href="">Histoires</a>
        <a href="">Connexion</a>
    </div>
    <div>
        <h2>Contacts</h2>
        <a href="">Instagram</a>
        <a href="">Facebook</a>
        <a href="">Twitter</a>
        <a href="">Linkedin</a>
    </div>
    <div>
        <h2>Confidentialité</h2>
        <a href="">Conditions générales</a>
        <a href="">Vie privée</a>
        <a href="">Mentions légales</a>
        <a href="">Données personnelles</a>
    </div>
    <div>
        <h2>Newsletter</h2>
        <a href="{{route('histoires.index')}}"><img src = "{{url('storage\images\readme_blanc.png')}}"></a>
        <div>
            <input type="mail"/>
            <button>></button>
        </div>
    </div>
</footer>

<script>
  let currentSlide = 3;

  function changeSlide(n) {
    showSlide(currentSlide += n);
  }

  function showSlide(n) {
    const slides = document.querySelectorAll('.slide');
    
    if (n > slides.length) {
      currentSlide = 1;
    } else if (n < 1) {
      currentSlide = slides.length;
    }

    const transformValue = -(currentSlide - 1) * 100 + '%';
    document.querySelector('.carousel').style.transform = 'translateX(' + transformValue + ')';
  }

  document.addEventListener('keydown', function (event) {
    if (event.key === 'ArrowLeft') {
      changeSlide(-1);
    } else if (event.key === 'ArrowRight') {
      changeSlide(1);
    }
  });

  showSlide(currentSlide);
</script>

</x-layout>