@extends('layouts.app')

@section('title', '1RM Calculator')

@section('content')

<div class="calculator-container">

    <h1>1RM Calculator</h1>

    <!-- STANDARD -->
    <section class="calc-section">
        <h2>1RM Calculator (Standard)</h2>

        <form method="POST" action="{{ route('strength.standard') }}" class="calc-form">
            @csrf

            <label for="weight">Weight lifted (Kg):</label>
            <input type="number" id="weight" name="weight"
                   value="{{ $oldStandard['weight'] ?? '' }}" required>

            <label for="reps">Number of repetitions:</label>
            <input type="number" id="reps" name="reps"
                   value="{{ $oldStandard['reps'] ?? '' }}" required>

            <div class="button-container">
                <button type="submit" class="red-btn">Calculate 1RM</button>
            </div>
        </form>

        @isset($standardResult)
            <p class="result-text">
                Your estimated 1RM is: {{ $standardResult }} Kg
            </p>
        @endisset
    </section>

    <hr class="divider">

    <!-- DIPS / PULL UPS -->
    <section class="calc-section">
        <h2>1RM Calculator (Dips and Pull-ups)</h2>

        <form method="POST" action="{{ route('strength.dip') }}" class="calc-form">
            @csrf

            <label for="bodyWeight">Body weight (Kg):</label>
            <input type="number" id="bodyWeight" name="bodyWeight"
                   value="{{ $oldDip['bodyWeight'] ?? '' }}" required>

            <label for="addedWeight">Weight added (Kg):</label>
            <input type="number" id="addedWeight" name="addedWeight"
                   value="{{ $oldDip['addedWeight'] ?? '' }}" required>

            <label for="repsDip">Number of repetitions:</label>
            <input type="number" id="repsDip" name="repsDip"
                   value="{{ $oldDip['repsDip'] ?? '' }}" required>

            <div class="button-container">
                <button type="submit" class="red-btn">Calculate 1RM</button>
                <button type="button" class="red-btn" style="background:black;border:2px solid #ff0000;color:#ff0000;margin-left:10px;display:inline-flex;align-items:center;justify-content:center;text-decoration:none;" onclick="window.location='{{ url('/') }}'">Torna alla home</button>

            </div>
        </form>

        @isset($dipResult)
            <p class="result-text">
                Your estimated 1RM is: {{ $dipResult['max'] }} Kg.<br>
                You should add: {{ $dipResult['belt'] }} Kg on the belt.
            </p>
        @endisset
    </section>

</div>

@endsection

@push('styles')
<style>
.calculator-container {
    background-color: black;
    color: white;
    padding: 30px;
    max-width: 600px;
    margin: 100px auto 30px auto;
    border: 2px solid #ff0000;
    box-shadow: 0 0 20px #ff0000;
    border-radius: 10px;
}

.calculator-container h1 {
    color: #ff0000;
    text-align: center;
    font-size: 48px;
    margin-bottom: 30px;
}

.calc-section {
    margin-bottom: 30px;
}

.calc-section h2 {
    color: white;
    font-size: 24px;
    margin-bottom: 15px;
    text-align: center;
}

.calc-form {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 10px 20px;
    align-items: center;
}

.calc-form label {
    justify-self: end;
}

.calc-form input {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ff0000;
    border-radius: 5px;
    background-color: black;
    color: white;
}

.button-container {
    grid-column: 1 / -1;
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

button.red-btn {
    padding: 15px 30px;
    background-color: #ff0000;
    color: white;
    border: 2px solid black;
    cursor: pointer;
    width: 220px;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s, background-color 0.3s;
}

button.red-btn:hover {
    background-color: #cc0000;
    transform: scale(1.05);
}

.result-text {
    color: #ff0000;
    font-weight: bold;
    margin-top: 15px;
    text-align: center;
    font-size: 18px;
}

.divider {
    border: 0;
    border-top: 2px solid #ff0000;
    margin: 30px 0;
}

/* Responsive mobile */
@media (max-width: 768px) {
    .calculator-container {
        padding: 20px;
        margin: 120px 15px 20px 15px;
    }

    .calc-form {
        grid-template-columns: 1fr;
    }

    .calc-form label {
        justify-self: start;
    }

    button.red-btn {
        width: 100%;
    }

    .calculator-container h1 {
        font-size: 36px;
    }

    .calc-section h2 {
        font-size: 20px;
    }
}
</style>
@endpush
