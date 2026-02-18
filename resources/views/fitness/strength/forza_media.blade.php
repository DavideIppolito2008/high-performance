<?php /* Blade view for 'Forza Media' */ ?>
@extends('layouts.app')

@section('title', 'Forza Media')

@section('content')

<main class="container">
    <section>
        <h1 style="color: #ff0000;">Forza Media (Strength Levels)</h1>
        <h2>Calcola il tuo livello di forza relativo alla popolazione</h2>

        <form id="forza-form" class="calc-form">
            @csrf
            <div id="forza-data" style="display:none;" data-json='@json($forzaData ?? [])'></div>

            {{-- server diagnostics removed for cleaner UI --}}
            <label for="exercise">Seleziona esercizio:</label>
            <select id="exercise" name="exercise">
                <option value="deadlift">Deadlift</option>
                <option value="squat">Squat</option>
                <option value="bench">Bench Press</option>
            </select>

            <label for="gender">Sesso:</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="bodyweight">Peso corporeo (kg):</label>
            <input type="number" id="bodyweight" name="bodyweight" min="1">

            <label for="lifted">Peso sollevato (kg):</label>
            <input type="number" id="lifted" name="lifted" min="1">

            <label for="age">Età:</label>
            <input type="number" id="age" name="age" min="1">

            <div class="button-container">
                <button type="button" class="red-btn" onclick="calculateForza(event)">Calcola</button>
                <button type="button" class="red-btn" style="background:black;border:2px solid #ff0000;color:#ff0000;margin-left:10px;display:inline-flex;align-items:center;justify-content:center;text-decoration:none;" onclick="window.location='{{ url('/') }}'">Torna alla home</button>
            </div>
        </form>

        <h2>Risultato</h2>
        <p id="result"></p>

    {{-- client debug removed from UI; debug helpers remain in JS as no-ops if needed --}}
    </section>
</main>

@endsection

@push('styles')
<style>
/* Page-specific responsive tweaks */
.container { max-width: 780px; margin: 0 auto; padding: 20px; background: transparent; border-radius: 8px; }
.calc-form { display: grid; grid-template-columns: 1fr 2fr; gap: 12px 18px; align-items: center; }
.calc-form label { justify-self: end; }
.calc-form input, .calc-form select { padding: 10px; font-size: 16px; background: transparent; color: white; border: 1px solid #ff0000; width: 100%; }
.button-container { grid-column: 1 / -1; display: flex; justify-content: center; gap: 12px; margin-top: 18px; }
.red-btn { padding: 12px 20px; background: #ff0000; color: white; border: 2px solid black; cursor: pointer; font-size: 16px; font-weight: 700; text-transform: uppercase; }
#result { color: #ff0000; font-weight: bold; margin-top: 15px; }

@media (max-width: 900px) {
    .calc-form { grid-template-columns: 1fr 1fr; }
    .container { padding: 18px; }
}

@media (max-width: 600px) {
    .calc-form { grid-template-columns: 1fr; }
    .calc-form label { justify-self: start; }
    .button-container { flex-direction: column; }
    .red-btn { width: 100%; }
}
</style>
@endpush

@push('scripts')
<script>
    // Data provided inline via a hidden DOM element to avoid Blade/JS parsing issues
    const forzaElem = document.getElementById('forza-data');
    let forzatables = {};
    // safe debug helpers (no-op if debug UI removed)
    function debugJsonSet(text){ const el = document.getElementById('client-debug-json'); if(el) el.textContent = text; }
    function debugMsg(msg){ const el = document.getElementById('client-debug-messages'); if(el) el.textContent += msg + '\n'; }
    try {
        if (forzaElem && forzaElem.dataset && forzaElem.dataset.json) {
            forzatables = JSON.parse(forzaElem.dataset.json);
            debugJsonSet(JSON.stringify(forzatables, null, 2));
        } else {
            debugMsg('No data attribute found on forza-data element.');
        }
    } catch (e) {
        debugMsg('Error parsing forzatables JSON: ' + e.message);
    }

    // Age strength tables (copied from provided data)
    const ageStrengthTables = {
        male: {
            deadlift: [
                [15, 67, 95, 130, 170, 213],
                [20, 76, 109, 148, 194, 244],
                [25, 78, 112, 152, 200, 250],
                [30, 78, 112, 152, 200, 250],
                [35, 78, 112, 152, 200, 250],
                [40, 78, 112, 152, 200, 250],
                [45, 74, 106, 145, 189, 238],
                [50, 70, 99, 136, 178, 223],
                [55, 65, 92, 125, 164, 206],
                [60, 59, 84, 115, 150, 188],
                [65, 53, 76, 103, 135, 170],
                [70, 48, 68, 93, 122, 153],
                [75, 43, 61, 83, 109, 136],
                [80, 38, 54, 74, 97, 122],
                [85, 34, 49, 67, 87, 109],
                [90, 31, 44, 60, 79, 99]
            ],
            squat: [
                [15, 55, 80, 111, 147, 187],
                [20, 62, 91, 127, 168, 214],
                [25, 64, 93, 130, 173, 219],
                [30, 64, 93, 130, 173, 219],
                [35, 64, 93, 130, 173, 219],
                [40, 64, 93, 130, 173, 219],
                [45, 61, 89, 123, 164, 208],
                [50, 57, 83, 116, 154, 195],
                [55, 53, 77, 107, 142, 180],
                [60, 48, 70, 98, 130, 165],
                [65, 44, 63, 88, 117, 149],
                [70, 39, 57, 79, 105, 134],
                [75, 35, 51, 71, 94, 119],
                [80, 31, 46, 63, 84, 107],
                [85, 28, 41, 57, 75, 96],
                [90, 25, 37, 51, 68, 86]
            ],
            bench: [
                [15, 40, 59, 84, 112, 144],
                [20, 46, 68, 96, 129, 164],
                [25, 47, 70, 98, 132, 169],
                [30, 47, 70, 98, 132, 169],
                [35, 47, 70, 98, 132, 169],
                [40, 47, 70, 98, 132, 169],
                [45, 44, 66, 93, 125, 160],
                [50, 42, 62, 88, 118, 150],
                [55, 39, 57, 81, 109, 139],
                [60, 35, 52, 74, 99, 127],
                [65, 32, 47, 67, 90, 115],
                [70, 29, 42, 60, 80, 103],
                [75, 26, 38, 54, 72, 92],
                [80, 23, 34, 48, 64, 82],
                [85, 20, 30, 43, 58, 74],
                [90, 18, 27, 39, 52, 66]
            ]
        },
        female: {
            deadlift: [
                [15, 32, 51, 74, 102, 133],
                [20, 37, 58, 85, 117, 153],
                [25, 38, 60, 87, 120, 157],
                [30, 38, 60, 87, 120, 157],
                [35, 38, 60, 87, 120, 157],
                [40, 38, 60, 87, 120, 157],
                [45, 36, 57, 83, 114, 149],
                [50, 34, 53, 78, 107, 139],
                [55, 31, 49, 72, 99, 129],
                [60, 29, 45, 66, 90, 118],
                [65, 26, 41, 59, 82, 106],
                [70, 23, 36, 53, 73, 95],
                [75, 21, 33, 48, 66, 85],
                [80, 19, 29, 43, 59, 76],
                [85, 17, 26, 38, 53, 68],
                [90, 15, 23, 34, 47, 62]
            ],
            squat: [
                [15, 25, 41, 62, 88, 116],
                [20, 29, 47, 71, 100, 132],
                [25, 30, 48, 73, 103, 136],
                [30, 30, 48, 73, 103, 136],
                [35, 30, 48, 73, 103, 136],
                [40, 30, 48, 73, 103, 136],
                [45, 28, 46, 69, 97, 129],
                [50, 26, 43, 65, 92, 121],
                [55, 24, 40, 60, 85, 112],
                [60, 22, 36, 55, 77, 102],
                [65, 20, 33, 50, 70, 92],
                [70, 18, 29, 44, 63, 83],
                [75, 16, 26, 40, 56, 74],
                [80, 14, 24, 36, 50, 66],
                [85, 13, 21, 32, 45, 59],
                [90, 12, 19, 29, 40, 54]
            ],
            bench: [
                [15, 15, 27, 43, 63, 86],
                [20, 17, 31, 49, 72, 98],
                [25, 17, 31, 51, 74, 101],
                [30, 17, 31, 51, 74, 101],
                [35, 17, 31, 51, 74, 101],
                [40, 17, 31, 51, 74, 101],
                [45, 16, 30, 48, 70, 96],
                [50, 15, 28, 45, 66, 90],
                [55, 14, 26, 42, 61, 83],
                [60, 13, 24, 38, 56, 76],
                [65, 12, 21, 34, 50, 69],
                [70, 11, 19, 31, 45, 62],
                [75, 9, 17, 28, 40, 55],
                [80, 8, 15, 25, 36, 49],
                [85, 8, 14, 22, 32, 44],
                [90, 7, 12, 20, 29, 40]
            ]
        }
    };

    // expose for debugging in console
    window.ageStrengthTables = ageStrengthTables;

    function calculateForza(event) {
        // no default form submit
        const exercise = document.getElementById('exercise').value;
        const gender = document.getElementById('gender').value;
        const bodyweight = parseFloat(document.getElementById('bodyweight').value);
        const lifted = parseFloat(document.getElementById('lifted').value);
        const age = parseInt(document.getElementById('age').value, 10);

        const out = document.getElementById('result');
        out.innerHTML = '';

        if (Number.isNaN(lifted) || lifted <= 0) {
            out.innerHTML = 'Inserisci un valore valido per il peso sollevato.';
            debugMsg('Invalid lifted value: ' + lifted);
            return;
        }

    // compute absolute/ratio/age levels
        // convert level/order to percentile using a simple mapping and interpolate between thresholds
            // 1) absolute level (by weight thresholds) — return only level name
            let absoluteLevel = '';
            const levels = (forzatables[gender] && forzatables[gender][exercise]) || [];
            if (levels.length > 0) {
                levels.sort((a, b) => (a.weight || 0) - (b.weight || 0));
                for (const lvl of levels) {
                    if (!lvl.weight) continue;
                    if (lifted <= lvl.weight) { absoluteLevel = lvl.level; break; }
                }
                if (!absoluteLevel) {
                    absoluteLevel = levels[levels.length - 1].level;
                }
            }

            // 2) ratio level (level name + numeric ratio)
            let ratioLevel = '';
            let ratioNumeric = null;
            if (bodyweight > 0) {
                ratioNumeric = lifted / bodyweight;
                const ratioLevels = (forzatables[gender] && forzatables[gender][exercise + '_ratio']) || [];
                if (ratioLevels.length > 0) {
                    ratioLevels.sort((a, b) => (a.ratio || 0) - (b.ratio || 0));
                    for (const r of ratioLevels) {
                        if (!r.ratio) continue;
                        if (ratioNumeric <= r.ratio) { ratioLevel = r.level; break; }
                    }
                    if (!ratioLevel) ratioLevel = ratioLevels[ratioLevels.length - 1].level;
                }
            }

            // 3) age-adjusted level (name only)
            let ageLevel = '';
            try {
                const ageTables = window.ageStrengthTables || {};
                const ageTable = (ageTables[gender] && ageTables[gender][exercise]) || [];
                if (ageTable.length > 0 && !Number.isNaN(age)) {
                    for (const row of ageTable) {
                        if (age <= row[0]) {
                            for (let i = 1; i < row.length; i++) {
                                if (lifted <= row[i]) {
                                    ageLevel = ["Beginner", "Novice", "Intermediate", "Advanced", "Elite"][i - 1];
                                    break;
                                }
                            }
                            if (!ageLevel) ageLevel = 'Elite';
                            break;
                        }
                    }
                }
            } catch (e) {
                debugMsg('Error evaluating age tables: ' + e.message);
            }

            const parts = [];
            if (absoluteLevel) parts.push('Livello: ' + absoluteLevel);
            if (ratioLevel) parts.push('Rapporto forza-peso: ' + ratioLevel + (ratioNumeric ? ` (${ratioNumeric.toFixed(2)})` : ''));
            if (ageLevel) parts.push('Livello corretto per età: ' + ageLevel);

            out.innerHTML = parts.length ? parts.join('<br>') : 'Nessun livello trovato con i dati inseriti.';
        }

    </script>
@endpush
