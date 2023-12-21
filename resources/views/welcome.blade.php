<x-layout>
    @section('title')
        Accueil
    @endsection

<div class="grandcarou">

<h1>Vos coups de coeur</h1>



<div class="carousel-container">
  <div class="carousel">
    <div class="slide" id="slide1">
      <img src="https://upload.wikimedia.org/wikipedia/fr/c/c5/Logo_RC_Lens.svg" alt="Image 1">
      <div class="caption">
        <h2>Titre 1</h2>
        <p>Description 1</p>
      </div>
    </div>
    <div class="slide" id="slide2">
      <img src="https://www.psg.fr/img/DefaultOpenGraphImage.jpg?20231220" alt="Image 2">
      <div class="caption">
        <h2>Titre 2</h2>
        <p>Description 2</p>
      </div>
    </div>
    <div class="slide" id="slide2">
        <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/a/a1/Logo_FC_Barcelona.svg/1200px-Logo_FC_Barcelona.svg.png" alt="Image 2">
        <div class="caption">
            <h2>Titre 3</h2>
            <p>Description 3</p>
        </div>
      </div>    
      <div class="slide" id="slide2">
        <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/a/a1/Logo_FC_Barcelona.svg/1200px-Logo_FC_Barcelona.svg.png" alt="Image 2">
        <div class="caption">
            <h2>Titre 4</h2>
            <p>Description 4</p>
        </div>
      </div>    
      <div class="slide" id="slide2">
        <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/a/a1/Logo_FC_Barcelona.svg/1200px-Logo_FC_Barcelona.svg.png" alt="Image 2">
        <div class="caption">
            <h2>Titre 5</h2>
            <p>Description 5</p>
        </div>
      </div>    
      <div class="slide" id="slide2">
        <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/a/a1/Logo_FC_Barcelona.svg/1200px-Logo_FC_Barcelona.svg.png" alt="Image 2">
        <div class="caption">
            <h2>Titre 6</h2>
            <p>Description 6</p>
        </div>
      </div>    
      
    <!-- Ajoutez les autres slides de la même manière -->
  </div>
  <button class="prev" onclick="changeSlide(-1)">&#8249;</button>
  <button class="next" onclick="changeSlide(1)">&#8250;</button>
</div>


</div>


</x-layout>