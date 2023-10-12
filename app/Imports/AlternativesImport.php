<?php

namespace App\Imports;

use App\Http\Controllers\CriteriaRatingController;
use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaRating;
use App\Models\CriteriaWeight;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\ToModel;

class AlternativesImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    // public function mapping(): array
    // {
    //     return [
    //         'name'  => 'A1',
    //         'C1' => 'B2',
    //         'C2' => 'B3',
    //         'C3' => 'B4',
    //         'C4' => 'B5',
    //         'C5' => 'B6',
    //     ];
    // }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row){
            $alt = new Alternative;
            $alt->name = $row[0];
            $alt->save();

            $criteria1 = new AlternativeScore();
            $criteria1->alternative_id = $alt->id;
            $criteria1->criteria_id = 1;
            $criteria1->rating_id = CriteriaRating::where('criteria_id', 1)->where('rating', $row[1])->get()->pluck('id')[0];
            $criteria1->save();

            $criteria2 = new AlternativeScore();
            $criteria2->alternative_id = $alt->id;
            $criteria2->criteria_id = 2;
            $criteria2->rating_id = CriteriaRating::where('criteria_id', 2)->where('rating', $row[2])->get()->pluck('id')[0];
            $criteria2->save();

            $criteria3 = new AlternativeScore();
            $criteria3->alternative_id = $alt->id;
            $criteria3->criteria_id = 3;
            $criteria3->rating_id = CriteriaRating::where('criteria_id', 3)->where('rating', $row[3])->get()->pluck('id')[0];
            $criteria3->save();

            $criteria4 = new AlternativeScore();
            $criteria4->alternative_id = $alt->id;
            $criteria4->criteria_id = 4;
            $criteria4->rating_id = CriteriaRating::where('criteria_id', 4)->where('rating', $row[4])->get()->pluck('id')[0];
            $criteria4->save();

            $criteria5 = new AlternativeScore();
            $criteria5->alternative_id = $alt->id;
            $criteria5->criteria_id = 6;
            $criteria5->rating_id = CriteriaRating::where('criteria_id', 6)->where('rating', $row[5])->get()->pluck('id')[0];
            $criteria5->save();

            // // Save the score
            // $criteriaweight = CriteriaWeight::get();
            // foreach ($criteriaweight as $cw) {

            //     $score = new AlternativeScore();
            //     $score->alternative_id = $alt->id;
            //     $score->criteria_id = $cw->id;
            //     $criteriaratings = CriteriaRating::where('criteria_id', $cw->id)->all();
            //     foreach($criteriaratings as $cr){
            //         if($row[$cw->name] == $cr->rating){
            //             $score->rating_id = $cr->id;
            //         }
            //     }
            //     $score->save();
            // }
        }

    }
}
