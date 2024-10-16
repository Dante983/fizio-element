<!-- resources/views/about.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profile">
            <img src={{ asset('images/profile-image.jpg') }} alt="Miroslav" class="profile-image">
            <h1>Miroslav Knezevic</h1>
            <p>
                Miroslav je posvećeni fizijatar i vlasnik Fizio Element klinike. Sa godinama iskustva u fizikalnoj terapiji
                i rehabilitaciji, pomogao je brojnim pacijentima da se oporave od povreda, upravljaju bolom i poboljšaju
                pokretljivost.
            </p>
            <p>
                Njegova misija je da stvori prijatno mesto gde pacijenti dobijaju personalizovane planove tretmana,
                dizajnirane prema njihovim specifičnim potrebama.
            </p>
        </div>
    </div>
@endsection

<!-- CSS -->
<style>
    .profile {
        /* text-align: center; */
        /* padding: 50px; */
    }

    .profile-image {
        /* width: 200px; */
        /* border-radius: 50%; */
    }
</style>
