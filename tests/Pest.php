<?php

/*
|--------------------------------------------------------------------------
| Testfall
|--------------------------------------------------------------------------
|
| Die Closure, die du deinen Testfunktionen übergibst, ist immer an eine bestimmte PHPUnit-Testfallklasse gebunden.
| Standardmäßig ist diese Klasse "PHPUnit\Framework\TestCase". Natürlich kannst du dies mit der Funktion "pest()"
| ändern, um eine andere Klasse oder Traits zu binden.
|
*/

pest()->extend(Tests\TestCase::class)
    ->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Erwartungen
|--------------------------------------------------------------------------
|
| Beim Schreiben von Tests musst du oft prüfen, ob Werte bestimmte Bedingungen erfüllen.
| Die Funktion "expect()" gibt dir Zugriff auf eine Reihe von Methoden, mit denen du verschiedene Dinge prüfen kannst.
| Natürlich kannst du die Expectation-API jederzeit erweitern.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}
