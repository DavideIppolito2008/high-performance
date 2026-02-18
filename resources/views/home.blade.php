@extends('layouts.app')


@section('content')

<main class="container">
    <h1>High Performance</h1>
    <h2>Become the best version of you</h2>

    <div class="button-container">
        <h3>How strong am I?</h3>
        <button class="gold-btn" onclick="location.href='{{ route('strength.index') }}'">Calculate Max</button>

    <button class="gold-btn" style="background:white;color:black;border:2px solid #D4AF37;" onclick="location.href='{{ route('strength.forza_media') }}'">Forza Media</button>

    </div>
</main>

@endsection

@push('styles')
<style>
/* Stile generale */
body {
    font-family: 'Roboto Slab', serif;
    background-color: black;
    color: white;
    margin: 0;
    padding: 0;
}

h1 {
    text-transform: uppercase;
    font-size: 50px;
    font-weight: bold;
    font-family: 'Montserrat', sans-serif;
    color: #D4AF37;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
    text-align: center;
}

h2 {
    font-weight: 400;
    color: #fff;
    margin-bottom: 30px;
    text-align: center;
}

main.container {
    background-color: black;
    padding: 30px;
    text-align: center;
    max-width: 600px;
    margin: 140px auto 20px auto;
    border: 2px solid #D4AF37;
    box-shadow: 0 0 20px #D4AF37;
    border-radius: 10px;
}

.button-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-top: 30px;
}

button.gold-btn {
    padding: 15px 30px;
    background-color: #D4AF37;
    color: black;
    border: 2px solid black;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    box-shadow: 0 4px 6px rgba(0,0,0,0.3);
    transition: transform 0.3s, background-color 0.3s;
    font-family: 'Montserrat', sans-serif;
}

button.gold-btn:hover {
    background-color: #b8860b;
    transform: scale(1.05);
}

/* Media query per dispositivi mobili */
@media (max-width: 768px) {
    main.container {
        padding: 20px;
        margin-top: 100px;
    }

    h1 {
        font-size: 36px;
    }

    button.gold-btn {
        width: 100%;
    }
}
</style>
@endpush
