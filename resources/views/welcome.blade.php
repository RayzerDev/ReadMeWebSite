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
              <img src="{{url($h->photo)}}" alt="Image 1" style="width: 350px">
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




<a href=""><button class="butonindex2">Tenter l'expérience</button></a>

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
    <a href=""><button class="butonindex2">Créer mon histoire</button></a>





</div><div class="videoroman">

<h1>Interview de l'auteur de "Un destin inattendu"</h1>





<iframe class="videoindex" width="560" height="315" src="https://www.youtube.com/embed/UKoVRU1KeGo" frameborder="0" allowfullscreen margin="auto"></iframe>




</div>

<div class="typehistoire">


<h1>Quel type d'histoire</h1>

<img class='souligne' src="{{url('storage\images\Vector 7.png')}}">



<div class="tags">

<div class="tagsbtn"><a href="">Policier</a></div>

<div class="tagsbtn"><a href="">Romantique</a></div>

<div class="tagsbtn"><a href="">Science fiction</a></div>

<div class="tagsbtn"><a href="">Fantastique </a></div>



</div>

<div class="tags">

<div class="tagsbtn"><a href="">Aventure</a></div>

<div class="tagsbtn"><a href="">Psychologique</a></div>

<div class="tagsbtn"><a href="">Horreur</a></div>

<div class="tagsbtn"><a href="">Réaliste</a></div>



</div>

</div>


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