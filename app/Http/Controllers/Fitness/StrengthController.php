<?php

namespace App\Http\Controllers\Fitness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class StrengthController extends Controller
{
    public function index()
    {
        return view('fitness.strength.index');
    }

    public function forzaMedia()
    {
        // Try to load from DB table `strength_standards` if it exists, otherwise provide fallback data.
        $forzaData = [];
        $dbAvailable = false;
        $tableExists = false;
        $rowsCount = 0;
        $dbError = null;

        try {
            $dbAvailable = true;
            if (Schema::hasTable('strength_standards')) {
                $tableExists = true;
                $rows = DB::table('strength_standards')->orderBy('level_order')->get();
                $rowsCount = $rows->count();
                // Expecting rows with columns: exercise, gender, level, weight, ratio, level_order
                // Merge rows by (gender, exercise, level) to avoid duplicates and combine weight/ratio
                $merged = [];
                foreach ($rows as $row) {
                    $g = $row->gender;
                    $ex = $row->exercise;
                    $lvl = $row->level;
                    $order = (int) $row->level_order;
                    $weight = is_null($row->weight) ? null : (float) $row->weight;
                    $ratio = is_null($row->ratio) ? null : (float) $row->ratio;

                    $key = "$g|$ex|$lvl";
                    if (!isset($merged[$key])) {
                        $merged[$key] = [
                            'gender' => $g,
                            'exercise' => $ex,
                            'level' => $lvl,
                            'weight' => $weight,
                            'ratio' => $ratio,
                            'order' => $order,
                        ];
                    } else {
                        // prefer non-null/non-zero values
                        if (($merged[$key]['weight'] ?? 0) <= 0 && ($weight ?? 0) > 0) {
                            $merged[$key]['weight'] = $weight;
                        }
                        if (($merged[$key]['ratio'] ?? 0) <= 0 && ($ratio ?? 0) > 0) {
                            $merged[$key]['ratio'] = $ratio;
                        }
                        // keep smallest order if differs
                        $merged[$key]['order'] = min($merged[$key]['order'], $order);
                    }
                }

                // Build forzaData arrays from merged entries
                foreach ($merged as $m) {
                    $g = $m['gender'];
                    $ex = $m['exercise'];
                    if (!isset($forzaData[$g])) $forzaData[$g] = [];
                    if (!isset($forzaData[$g][$ex])) {
                        $forzaData[$g][$ex] = [];
                        $forzaData[$g][$ex . '_ratio'] = [];
                    }
                    if (!empty($m['weight']) && $m['weight'] > 0) {
                        $forzaData[$g][$ex][] = [
                            'level' => $m['level'],
                            'weight' => $m['weight'],
                            'order' => $m['order'],
                        ];
                    }
                    if (!empty($m['ratio']) && $m['ratio'] > 0) {
                        $forzaData[$g][$ex . '_ratio'][] = [
                            'level' => $m['level'],
                            'ratio' => $m['ratio'],
                            'order' => $m['order'],
                        ];
                    }
                }

                // sort each array by order
                foreach ($forzaData as $g => $arr) {
                    foreach ($arr as $key => $vals) {
                        usort($forzaData[$g][$key], function ($a, $b) {
                            return ($a['order'] ?? 0) <=> ($b['order'] ?? 0);
                        });
                    }
                }
            }
        } catch (\Exception $e) {
            $dbError = $e->getMessage();
        }

        // fallback minimal dataset
        if (empty($forzaData)) {
            $forzaData = [
                'male' => [
                    'deadlift' => [
                        ['level' => 'Beginner', 'weight' => 78, 'ratio' => 1.0],
                        ['level' => 'Novice', 'weight' => 112, 'ratio' => 1.5],
                        ['level' => 'Intermediate', 'weight' => 152, 'ratio' => 2.0],
                    ],
                    'deadlift_ratio' => [
                        ['level' => 'Beginner', 'ratio' => 1.0],
                        ['level' => 'Novice', 'ratio' => 1.5],
                        ['level' => 'Intermediate', 'ratio' => 2.0],
                    ],
                ],
                'female' => [
                    'deadlift' => [
                        ['level' => 'Beginner', 'weight' => 38, 'ratio' => 0.5],
                        ['level' => 'Novice', 'weight' => 60, 'ratio' => 1.0],
                    ],
                    'deadlift_ratio' => [
                        ['level' => 'Beginner', 'ratio' => 0.5],
                        ['level' => 'Novice', 'ratio' => 1.0],
                    ],
                ],
            ];
        }

        return view('fitness.strength.forza_media', [
            'forzaData' => $forzaData,
            'dbAvailable' => $dbAvailable,
            'tableExists' => $tableExists,
            'rowsCount' => $rowsCount,
            'dbError' => $dbError,
        ]);
    }

    public function calculateStandard(Request $request)
    {
        $data = $request->validate([
            'weight' => 'required|numeric|min:1',
            'reps' => 'required|integer|min:1'
        ]);

        $max = $data['weight'] * (1 + ($data['reps'] * 0.033));

        return view('fitness.strength.index', [
            'standardResult' => round($max, 2),
            'oldStandard' => $data
        ]);
    }

    public function calculateDip(Request $request)
    {
        $data = $request->validate([
            'bodyWeight' => 'required|numeric|min:1',
            'addedWeight' => 'required|numeric|min:0',
            'repsDip' => 'required|integer|min:1'
        ]);

        $totalWeight = $data['bodyWeight'] + $data['addedWeight'];
        $max = $totalWeight * (1 + ($data['repsDip'] * 0.033));
        $weightOnBelt = $max - $data['bodyWeight'];

        return view('fitness.strength.index', [
            'dipResult' => [
                'max' => round($max, 2),
                'belt' => round($weightOnBelt, 2)
            ],
            'oldDip' => $data
        ]);
    }
}
