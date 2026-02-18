<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrengthStandardsSeeder extends Seeder
{
    public function run(): void
    {
        // Full tables (weights and ratios) based on provided data
            $rows = [];

            // male weight thresholds
            $rows = array_merge($rows, [
                ['exercise'=>'deadlift','gender'=>'male','level'=>'Beginner','level_order'=>1,'weight'=>78,'ratio'=>null],
                ['exercise'=>'deadlift','gender'=>'male','level'=>'Novice','level_order'=>2,'weight'=>112,'ratio'=>null],
                ['exercise'=>'deadlift','gender'=>'male','level'=>'Intermediate','level_order'=>3,'weight'=>152,'ratio'=>null],
                ['exercise'=>'deadlift','gender'=>'male','level'=>'Advanced','level_order'=>4,'weight'=>200,'ratio'=>null],
                ['exercise'=>'deadlift','gender'=>'male','level'=>'Elite','level_order'=>5,'weight'=>250,'ratio'=>null],

                ['exercise'=>'squat','gender'=>'male','level'=>'Beginner','level_order'=>1,'weight'=>64,'ratio'=>null],
                ['exercise'=>'squat','gender'=>'male','level'=>'Novice','level_order'=>2,'weight'=>93,'ratio'=>null],
                ['exercise'=>'squat','gender'=>'male','level'=>'Intermediate','level_order'=>3,'weight'=>130,'ratio'=>null],
                ['exercise'=>'squat','gender'=>'male','level'=>'Advanced','level_order'=>4,'weight'=>173,'ratio'=>null],
                ['exercise'=>'squat','gender'=>'male','level'=>'Elite','level_order'=>5,'weight'=>219,'ratio'=>null],

                ['exercise'=>'bench','gender'=>'male','level'=>'Beginner','level_order'=>1,'weight'=>47,'ratio'=>null],
                ['exercise'=>'bench','gender'=>'male','level'=>'Novice','level_order'=>2,'weight'=>70,'ratio'=>null],
                ['exercise'=>'bench','gender'=>'male','level'=>'Intermediate','level_order'=>3,'weight'=>98,'ratio'=>null],
                ['exercise'=>'bench','gender'=>'male','level'=>'Advanced','level_order'=>4,'weight'=>132,'ratio'=>null],
                ['exercise'=>'bench','gender'=>'male','level'=>'Elite','level_order'=>5,'weight'=>169,'ratio'=>null],
            ]);

            // female weight thresholds
            $rows = array_merge($rows, [
                ['exercise'=>'deadlift','gender'=>'female','level'=>'Beginner','level_order'=>1,'weight'=>38,'ratio'=>null],
                ['exercise'=>'deadlift','gender'=>'female','level'=>'Novice','level_order'=>2,'weight'=>60,'ratio'=>null],
                ['exercise'=>'deadlift','gender'=>'female','level'=>'Intermediate','level_order'=>3,'weight'=>87,'ratio'=>null],
                ['exercise'=>'deadlift','gender'=>'female','level'=>'Advanced','level_order'=>4,'weight'=>120,'ratio'=>null],
                ['exercise'=>'deadlift','gender'=>'female','level'=>'Elite','level_order'=>5,'weight'=>157,'ratio'=>null],

                ['exercise'=>'squat','gender'=>'female','level'=>'Beginner','level_order'=>1,'weight'=>30,'ratio'=>null],
                ['exercise'=>'squat','gender'=>'female','level'=>'Novice','level_order'=>2,'weight'=>48,'ratio'=>null],
                ['exercise'=>'squat','gender'=>'female','level'=>'Intermediate','level_order'=>3,'weight'=>73,'ratio'=>null],
                ['exercise'=>'squat','gender'=>'female','level'=>'Advanced','level_order'=>4,'weight'=>103,'ratio'=>null],
                ['exercise'=>'squat','gender'=>'female','level'=>'Elite','level_order'=>5,'weight'=>136,'ratio'=>null],

                ['exercise'=>'bench','gender'=>'female','level'=>'Beginner','level_order'=>1,'weight'=>17,'ratio'=>null],
                ['exercise'=>'bench','gender'=>'female','level'=>'Novice','level_order'=>2,'weight'=>31,'ratio'=>null],
                ['exercise'=>'bench','gender'=>'female','level'=>'Intermediate','level_order'=>3,'weight'=>51,'ratio'=>null],
                ['exercise'=>'bench','gender'=>'female','level'=>'Advanced','level_order'=>4,'weight'=>74,'ratio'=>null],
                ['exercise'=>'bench','gender'=>'female','level'=>'Elite','level_order'=>5,'weight'=>101,'ratio'=>null],
            ]);

            // male ratio thresholds
            $rows = array_merge($rows, [
                ['exercise'=>'deadlift','gender'=>'male','level'=>'Beginner','level_order'=>1,'weight'=>0,'ratio'=>1.00],
                ['exercise'=>'deadlift','gender'=>'male','level'=>'Novice','level_order'=>2,'weight'=>0,'ratio'=>1.50],
                ['exercise'=>'deadlift','gender'=>'male','level'=>'Intermediate','level_order'=>3,'weight'=>0,'ratio'=>2.00],
                ['exercise'=>'deadlift','gender'=>'male','level'=>'Advanced','level_order'=>4,'weight'=>0,'ratio'=>2.50],
                ['exercise'=>'deadlift','gender'=>'male','level'=>'Elite','level_order'=>5,'weight'=>0,'ratio'=>3.00],

                ['exercise'=>'squat','gender'=>'male','level'=>'Beginner','level_order'=>1,'weight'=>0,'ratio'=>0.75],
                ['exercise'=>'squat','gender'=>'male','level'=>'Novice','level_order'=>2,'weight'=>0,'ratio'=>1.25],
                ['exercise'=>'squat','gender'=>'male','level'=>'Intermediate','level_order'=>3,'weight'=>0,'ratio'=>1.50],
                ['exercise'=>'squat','gender'=>'male','level'=>'Advanced','level_order'=>4,'weight'=>0,'ratio'=>2.25],
                ['exercise'=>'squat','gender'=>'male','level'=>'Elite','level_order'=>5,'weight'=>0,'ratio'=>2.75],

                ['exercise'=>'bench','gender'=>'male','level'=>'Beginner','level_order'=>1,'weight'=>0,'ratio'=>0.50],
                ['exercise'=>'bench','gender'=>'male','level'=>'Novice','level_order'=>2,'weight'=>0,'ratio'=>0.75],
                ['exercise'=>'bench','gender'=>'male','level'=>'Intermediate','level_order'=>3,'weight'=>0,'ratio'=>1.25],
                ['exercise'=>'bench','gender'=>'male','level'=>'Advanced','level_order'=>4,'weight'=>0,'ratio'=>1.75],
                ['exercise'=>'bench','gender'=>'male','level'=>'Elite','level_order'=>5,'weight'=>0,'ratio'=>2.00],
            ]);

            // female ratio thresholds
            $rows = array_merge($rows, [
                ['exercise'=>'deadlift','gender'=>'female','level'=>'Beginner','level_order'=>1,'weight'=>0,'ratio'=>0.50],
                ['exercise'=>'deadlift','gender'=>'female','level'=>'Novice','level_order'=>2,'weight'=>0,'ratio'=>1.00],
                ['exercise'=>'deadlift','gender'=>'female','level'=>'Intermediate','level_order'=>3,'weight'=>0,'ratio'=>1.25],
                ['exercise'=>'deadlift','gender'=>'female','level'=>'Advanced','level_order'=>4,'weight'=>0,'ratio'=>1.75],
                ['exercise'=>'deadlift','gender'=>'female','level'=>'Elite','level_order'=>5,'weight'=>0,'ratio'=>2.50],

                ['exercise'=>'squat','gender'=>'female','level'=>'Beginner','level_order'=>1,'weight'=>0,'ratio'=>0.50],
                ['exercise'=>'squat','gender'=>'female','level'=>'Novice','level_order'=>2,'weight'=>0,'ratio'=>0.75],
                ['exercise'=>'squat','gender'=>'female','level'=>'Intermediate','level_order'=>3,'weight'=>0,'ratio'=>1.25],
                ['exercise'=>'squat','gender'=>'female','level'=>'Advanced','level_order'=>4,'weight'=>0,'ratio'=>1.50],
                ['exercise'=>'squat','gender'=>'female','level'=>'Elite','level_order'=>5,'weight'=>0,'ratio'=>2.00],

                ['exercise'=>'bench','gender'=>'female','level'=>'Beginner','level_order'=>1,'weight'=>0,'ratio'=>0.25],
                ['exercise'=>'bench','gender'=>'female','level'=>'Novice','level_order'=>2,'weight'=>0,'ratio'=>0.50],
                ['exercise'=>'bench','gender'=>'female','level'=>'Intermediate','level_order'=>3,'weight'=>0,'ratio'=>0.75],
                ['exercise'=>'bench','gender'=>'female','level'=>'Advanced','level_order'=>4,'weight'=>0,'ratio'=>1.00],
                ['exercise'=>'bench','gender'=>'female','level'=>'Elite','level_order'=>5,'weight'=>0,'ratio'=>1.50],
            ]);

        $weightRatioTables = [
            'male' => [
                'deadlift' => [1.00,1.50,2.00,2.50,3.00],
                'squat' => [0.75,1.25,1.50,2.25,2.75],
                'bench' => [0.50,0.75,1.25,1.75,2.00],
            ],
            'female' => [
                'deadlift' => [0.50,1.00,1.25,1.75,2.50],
                'squat' => [0.50,0.75,1.25,1.50,2.00],
                'bench' => [0.25,0.50,0.75,1.00,1.50],
            ],
        ];

        $levels = ['Beginner','Novice','Intermediate','Advanced','Elite'];

        foreach ($strengthTables as $gender => $exercises) {
            foreach ($exercises as $exercise => $values) {
                foreach ($values as $i => $weight) {
                    $row = [
                        'exercise'=>$exercise,
                        'gender'=>$gender,
                        'level'=>$levels[$i],
                        'level_order'=>$i+1,
                        'weight'=>$weight,
                        'ratio'=>null,
                    ];
                    DB::table('strength_standards')->updateOrInsert(
                        ['exercise'=>$exercise,'gender'=>$gender,'level'=>$levels[$i]],
                        array_merge($row,['created_at'=>now(),'updated_at'=>now()])
                    );
                }
                // insert ratio rows
                if (isset($weightRatioTables[$gender][$exercise])) {
                    foreach ($weightRatioTables[$gender][$exercise] as $i => $ratio) {
                        $row = [
                            'exercise'=>$exercise,
                            'gender'=>$gender,
                            'level'=>$levels[$i],
                            'level_order'=>$i+1,
                            'weight'=>null,
                            'ratio'=>$ratio,
                        ];
                        DB::table('strength_standards')->updateOrInsert(
                            ['exercise'=>$exercise,'gender'=>$gender,'level'=>$levels[$i].'_ratio'],
                            array_merge($row,['created_at'=>now(),'updated_at'=>now()])
                        );
                    }
                }
            }
        }
    }
}
