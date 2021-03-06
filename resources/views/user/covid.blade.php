@extends('layouts.app')

@section('content')



<style>


body {
  display: flex;
  justify-content: Center;
  align-items: center;
  min-height: 100vh;
  background: linear-gradient(
      180deg,
      rgba(248, 184, 139, 0) 20%,
      rgba(248, 184, 139, 0.1) 20%,
      rgba(248, 184, 139, 0.1) 40%,
      rgba(248, 184, 139, 0.2) 40%,
      rgba(248, 184, 139, 0.2) 60%,
      rgba(248, 184, 139, 0.4) 60%,
      rgba(248, 184, 139, 0.4) 80%,
      rgba(248, 184, 139, 0.5) 80%
    ),
    linear-gradient(
      45deg,
      rgba(250, 248, 132, 0.3) 20%,
      rgba(250, 248, 132, 0.4) 20%,
      rgba(250, 248, 132, 0.4) 40%,
      rgba(250, 248, 132, 0.5) 40%,
      rgba(250, 248, 132, 0.5) 60%,
      rgba(250, 248, 132, 0.6) 60%,
      rgba(250, 248, 132, 0.6) 80%,
      rgba(250, 248, 132, 0.7) 80%
    ),
    linear-gradient(
      -45deg,
      rgba(186, 237, 145, 0) 20%,
      rgba(186, 237, 145, 0.1) 20%,
      rgba(186, 237, 145, 0.1) 40%,
      rgba(186, 237, 145, 0.2) 40%,
      rgba(186, 237, 145, 0.2) 60%,
      rgba(186, 237, 145, 0.4) 60%,
      rgba(186, 237, 145, 0.4) 80%,
      rgba(186, 237, 145, 0.6) 80%
    ),
    linear-gradient(
      90deg,
      rgba(178, 206, 254, 0) 20%,
      rgba(178, 206, 254, 0.3) 20%,
      rgba(178, 206, 254, 0.3) 40%,
      rgba(178, 206, 254, 0.5) 40%,
      rgba(178, 206, 254, 0.5) 60%,
      rgba(178, 206, 254, 0.7) 60%,
      rgba(178, 206, 254, 0.7) 80%,
      rgba(178, 206, 254, 0.8) 80%
    ),
    linear-gradient(
      -90deg,
      rgba(242, 162, 232, 0) 20%,
      rgba(242, 162, 232, 0.4) 20%,
      rgba(242, 162, 232, 0.4) 40%,
      rgba(242, 162, 232, 0.5) 40%,
      rgba(242, 162, 232, 0.5) 60%,
      rgba(242, 162, 232, 0.6) 60%,
      rgba(242, 162, 232, 0.6) 80%,
      rgba(242, 162, 232, 0.8) 80%
    ),
    linear-gradient(
      180deg,
      rgba(254, 163, 170, 0) 20%,
      rgba(254, 163, 170, 0.4) 20%,
      rgba(254, 163, 170, 0.4) 40%,
      rgba(254, 163, 170, 0.6) 40%,
      rgba(254, 163, 170, 0.6) 60%,
      rgba(254, 163, 170, 0.8) 60%,
      rgba(254, 163, 170, 0.8) 80%,
      rgba(254, 163, 170, 0.9) 80%
    );
  background-color: rgb(254, 163, 170);
  background-size: 100% 100%;
}
.container {
  background: rgba(255, 255, 255, 0.3);
  padding: 40px 20px;
  border-radius: 20px;
}
.card-deck {
  margin: 0 -25px;
  justify-content: center;
}
.card p {
  font-size: 1.4rem;
  border: 1px solid #fff;
}
h1 {
  font-size: 2rem;
  font-family: consolas;
}
img {
  width: 60px;
}
@media (min-width: 576px) and (max-width: 767.98px) {
  .card-deck .card {
    -ms-flex: 0 0 48.7%;
    flex: 0 0 48.7%;
  }
}
@media (min-width: 768px) and (max-width: 991.98px) {
  .card-deck .card {
    -ms-flex: 0 0 32%;
    flex: 0 0 32%;
  }
}
@media (min-width: 992px) {
  .card-deck .card {
    -ms-flex: 0 0 24%;
    flex: 0 0 24%;
  }
}
.animatediv img:nth-child(1) {
  position: absolute;
  right: -6rem;
  top: -8rem;
}
.animatediv img:nth-child(2) {
  position: absolute;
  left: -38rem;
  top: -3rem;
}
.animatediv img:nth-child(3) {
  position: absolute;
  left: -6rem;
  bottom: -42rem;
}
.animatediv img:nth-child(4) {
  position: absolute;
  left: -36rem;
  bottom: -42rem;
}
.animatediv {
  animation: MoveUpDown 10s linear infinite alternate-reverse;
  position: absolute;
  right: 300px;
}
/* position of corona animation */
@keyframes MoveUpDown {
  0%,
  100% {
    top: 150px;
  }
  50% {
    top: 250px;
  }
}



</style>

<br><br>
<div class="animatediv">
</div>
<div class="container text-center">
  <h1 class="">Covid-19 Cases In <span id="country"></span> <img src="" alt="" id="flag"></h1><br><br>
  <div class="card-deck text-center">
    <div class="card mb-2">
      <div class="card-body bg-primary text-light rounded">
        <h5 class="card-title"><i class="fas fa-tachometer-alt fa-2x"></i></h5>
        <h4 class="card-text">Active Cases</h4>
        <p class="card-text badge badge-outline-light" id="Active_Cases">21</p>
      </div>
    </div>
    <div class="card mb-2">
      <div class="card-body bg-info text-light rounded">
        <h5 class="card-title"><i class="fas fa-list fa-2x"></i></h5>
        <h4 class="card-text">Total Cases</h4>
        <p class="card-text badge badge-outline-light" id="Total_Cases">21</p>
      </div>
    </div>
    <div class="card mb-2">
      <div class="card-body bg-warning text-light rounded">
        <h5 class="card-title"><i class="fas fa-times-circle fa-2x"></i></h5>
        <h4 class="card-text">Critical Cases</h4>
        <p class="card-text badge badge-outline-light" id="Critical_Cases">21</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body bg-danger text-light rounded">
        <h5 class="card-title"><i class="fa fa-times fa-2x"></i></h5>
        <h4 class="card-text">Total Death</h4>
        <p class="card-text badge badge-outline-light" id="Total_Death">21</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body bg-success text-light rounded">
        <h5 class="card-title"><i class="fas fa-check-square fa-2x"></i></h5>
        <h4 class="card-text">Recovered Cases</h4>
        <p class="card-text badge badge-outline-light" id="Recovered_Cases">21</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body bg-secondary text-light rounded">
        <h5 class="card-title"><i class="fas fa-eye fa-2x"></i></h5>
        <h4 class="card-text">Total Test Done</h4>
        <p class="card-text badge badge-outline-light" id="Total_Test_Done">21</p>
      </div>
    </div>
  </div>
</div>

<script>

fetch("https://corona.lmao.ninja/v2/countries/egypt")
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data);
    document.getElementById("flag").src = data.countryInfo.flag;
    document.getElementById("country").innerHTML = data.country;
    document.getElementById("Active_Cases").innerHTML = data.active;
    document.getElementById("Total_Cases").innerHTML = data.cases;
    document.getElementById("Critical_Cases").innerHTML = data.critical;
    document.getElementById("Total_Death").innerHTML = data.deaths;
    document.getElementById("Recovered_Cases").innerHTML = data.recovered;
    document.getElementById("Total_Test_Done").innerHTML = data.tests;
  });


</script>


@endsection
