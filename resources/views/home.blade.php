@extends('layouts.app')

@section('content')



  <div class="container" style="position:relative; top:50px"> 
  <div class="row justify-content-center">
    <header>
        <form method="get" action="{{route('user.appointment')}}">
        @csrf
        <section class="header-content">
            <h1>Welcome</h1>
            <p> Welcome to our studio. We are a passionated group of people,<br>
            making high quality products designed to make your life easier.</p>
            <button type="submit" class="btn btn-secondary">Book an Appointment</button>
        </section>
        
        </form>
    </header>        
  
  </div>

    </div>

@endsection
