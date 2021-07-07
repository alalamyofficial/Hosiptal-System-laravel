<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});



$botman->hears('treatment for cold', function ($bot) {
    $bot->reply('Stay hydrated. Water, juice, clear broth or warm lemon water with honey helps loosen congestion and prevents dehydration. ...
    Rest. Your body needs rest to heal.
    Soothe a sore throat. ...
    Combat stuffiness. ...
    Relieve pain. ...
    Sip warm liquids. ...
    Try honey. ...
    Add moisture to the air.');
});

$botman->hears('treatment for covid', function ($bot) {
    $bot->reply('Call your health care provider or COVID-19 hotline to find out where and when to get a test.
    Cooperate with contact-tracing procedures to stop the spread of the virus.
    If testing is not available, stay home and away from others for 14 days.
    While you are in quarantine, do not go to work, to school or to public places. Ask someone to bring you supplies.
    Keep at least a 1-metre distance from others, even from your family members.
    Wear a medical mask to protect others, including if/when you need to seek medical care.
    Clean your hands frequently.
    Stay in a separate room from other family members, and if not possible, wear a medical mask.
    Keep the room well-ventilated.
    If you share a room, place beds at least 1 metre apart.
    Monitor yourself for any symptoms for 14 days.
    Call your health care provider immediately if you have any of these danger signs: difficulty breathing, loss of speech or mobility, confusion or chest pain.
    Stay positive by keeping in touch with loved ones by phone or online, and by exercising at home.');
});


$botman->hears('treatment for sensitivity', function ($bot) {
    $bot->reply('Desensitizing toothpaste. There are several brands of toothpaste for sensitive teeth that are available. ...
    Use a soft-bristled toothbrush.
    Avoid highly acidic foods.
    Use a fluoridated mouthwash daily.
    Avoid teeth grinding. Consider getting a mouth guard');
});


$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});


$botman->hears('Start conversation', BotManController::class.'@startConversation');


