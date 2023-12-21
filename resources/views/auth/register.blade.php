@extends("templates.app")

@section('content')

<h2>Inscription</h2>
<img class='souligne' src="{{url('storage\images\Vector 7.png')}}">


<div class="form1reg">
<div class="formreg">
<form action="{{route("register")}}" method="post">
    @csrf
    <input type="text" name="name" required placeholder="Name" /><br />
    <input type="email" name="email" required placeholder="Email" /><br />
    <input type="password" name="password" required placeholder="password" /><br />
    <input type="password" name="password_confirmation" required placeholder="password" /><br />
    <input type="submit" /><br />
</form>

<p>Déjà un compte ? <a href="{{route("login")}}" class="register">Connectez vous</a></p>

</div>
</div>

@endsection
