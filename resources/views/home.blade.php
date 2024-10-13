<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="hero">
            <img src="/images/fizio-element.jpg" alt="Fizio Element" class="hero-image">
            <h1>Dobrodošli u Fizio Element</h1>
            <p>
                Fizio Element je savremena klinika za fizikalnu terapiju koja se specijalizuje za rehabilitaciju i
                upravljanje bolom. Naš tim profesionalaca posvećen je pružanju personalizovane nege u modernom i prijatnom
                okruženju.
            </p>
        </div>
        <div class="features">
            <h2>Zašto izabrati nas?</h2>
            <div class="feature-list">
                <div class="feature-item">
                    <img src="/images/modern-equipment.jpg" alt="Moderna oprema">
                    <h3>Moderna oprema</h3>
                    <p>Koristimo najnoviju opremu za fizioterapiju kako bismo osigurali optimalnu njegu.</p>
                </div>
                <div class="feature-item">
                    <img src="/images/qualified-staff.jpg" alt="Kvalifikovano osoblje">
                    <h3>Kvalifikovano osoblje</h3>
                    <p>Naš tim čine iskusni stručnjaci posvećeni vašem oporavku.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- CSS (In your styles file) -->
<!-- <style> -->
<!--     .hero { -->
<!--         text-align: center; -->
<!--         padding: 50px; -->
<!--     } -->
<!---->
<!--     .hero-image { -->
<!--         width: 100%; -->
<!--         height: auto; -->
<!--     } -->
<!---->
<!--     .features { -->
<!--         margin: 40px 0; -->
<!--     } -->
<!---->
<!--     .feature-list { -->
<!--         display: flex; -->
<!--         justify-content: space-around; -->
<!--     } -->
<!---->
<!--     .feature-item { -->
<!--         text-align: center; -->
<!--         width: 30%; -->
<!--     } -->
<!---->
<!--     .feature-item img { -->
<!--         width: 100%; -->
<!--         height: auto; -->
<!--     } -->
<!-- </style> -->
