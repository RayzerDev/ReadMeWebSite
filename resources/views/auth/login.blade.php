<x-layout>
<h2> Connexion </h2>
<img class='souligne' src="{{url('storage\images\Vector 7.png')}}">


<div class="form1">
<div class="form">
    <form action="{{route("login")}}" method="post">
        @csrf
        <input type="email" name="email" required placeholder="Email" /><br />
        <input type="password" name="password" required placeholder="password" /><br />
        <input type="submit" /><br />
    </form>
    <p>Pas de compte ? <a href="{{route('register')}}" class="register">Inscrivez-vous.</a></p> 
</div>
</div>
</x-layout>