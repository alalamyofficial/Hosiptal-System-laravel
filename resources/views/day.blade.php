@extends('layouts.app')

@section('content')



<div class="container" style="margin-top:20px">
    <div class="row justify-content-center">
    
        <h1>Today is:</h1>
        <div>
            <span id="weekday" style="font-weight:bold; font-size:27px; margin-left:20px; margin-top:40px;">
                Display day of the week.
            </span>
            </br><br>
            Qoute :  <span id="phrase" style="color:red;">Display a quote</span>
        </div>
    </div>
</div>

<script>

let date = new Date();
let dayOfWeekNumber = date.getDay();
let nameOfDay;
let quote;

switch(dayOfWeekNumber){
    case 0: 
        nameOfDay = 'Sunday';
        quote = 'Time to chillax!';
        break;
    case 1:
        nameOfDay = 'Monday';
        quote = 'Monday morning blues!';
        break;
    case 2:
        nameOfDay = 'Tuesday';
        quote = 'Taco Time!';
        break;
    case 3:
        nameOfDay = 'Wednesday';
        quote = 'Two more days to the weekend.';
        break;
    case 4:
        nameOfDay = 'Thursday';
        quote = 'The weekend is almost here...';
        break;
    case 5:
        nameOfDay = 'Friday';
        quote = 'Weekend is here!';
        break;
    case 6:
        nameOfDay = 'Saturday';
        quote = 'Time to party!';
        break;

}
//Display the day of the week
let weekdayDiv = document.getElementById('weekday');
weekdayDiv.innerHTML = `${nameOfDay}`;

//Display quote
let quoteDiv = document.getElementById('phrase');
quoteDiv.innerHTML = `${quote}`

</script>

@endsection
