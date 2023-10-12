<?php

namespace App\Http\Controllers;

use App\Exports\RaportExport;
use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = AlternativeScore::select(
            'alternativescores.id as id',
            'alternatives.id as ida',
            'criteriaweights.id as idw',
            'criteriaratings.id as idr',
            'alternatives.name as name',
            'criteriaweights.name as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description'
        )
            ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
            ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
            ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
            ->get();

        // duplicate scores object to get rating value later,
        // because any call to $scores object is pass by reference
        // clone, replica, tobase didnt work
        $criteriaScores = AlternativeScore::select(
            'alternativescores.id as id',
            'alternatives.id as ida',
            'criteriaweights.id as idw',
            'criteriaratings.id as idr',
            'alternatives.name as name',
            'criteriaweights.name as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description'
        )
            ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
            ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
            ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
            ->get();



        $alternatives = Alternative::get();

        $criteriaweights = CriteriaWeight::get();

        // Normalization
        foreach ($alternatives as $alternative) {
            // Get all scores for each alternative id
            $alternativeFilter = $scores->where('ida', $alternative->id)->values()->all();
            // Loop each criteria
            foreach ($criteriaweights as $key => $criteriaWeight) {
                // Get all rating value for each criteria
                $rates = $criteriaScores->map(function ($val) use ($criteriaWeight) {
                    if ($criteriaWeight->id == $val->idw) {
                        return $val->rating;
                    }
                })->toArray();

                // array_filter untuk menghilangkan value null dari fungsi map sebelumnya
                // array_values untuk mengindex ulang array agar berurutan kembali
                $rates = array_values(array_filter($rates));

                if ($criteriaWeight->type == 'benefit') {
                    $result = $alternativeFilter[$key]->rating / max($rates);
                    $msg = 'rate ' . $alternativeFilter[$key]->rating . ' max ' . max($rates) . ' res ' . $result;
                } elseif ($criteriaWeight->type == 'cost') {
                    $result = min($rates) / $alternativeFilter[$key]->rating;
                }
                $result *= $criteriaWeight->weight;
                $alternativeFilter[$key]->rating = round($result, 2);
            }
        }

        return view('rank', compact('scores', 'alternatives', 'criteriaweights'))->with('i', 0);
    }

    // public function export()
    // {
    //     return Excel::download(new RaportExport, 'raport.xlsx', \Maatwebsite\Excel\Excel::DOMPDF);
    // }

    public function export()
    {
        $scores = AlternativeScore::select(
            'alternativescores.id as id',
            'alternatives.id as ida',
            'criteriaweights.id as idw',
            'criteriaratings.id as idr',
            'alternatives.name as name',
            'criteriaweights.name as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description'
        )
            ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
            ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
            ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
            ->get();

        // duplicate scores object to get rating value later,
        // because any call to $scores object is pass by reference
        // clone, replica, tobase didnt work
        $criteriaScores = AlternativeScore::select(
            'alternativescores.id as id',
            'alternatives.id as ida',
            'criteriaweights.id as idw',
            'criteriaratings.id as idr',
            'alternatives.name as name',
            'criteriaweights.name as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description'
        )
            ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
            ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
            ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
            ->get();



        $alternatives = Alternative::get();

        $criteriaweights = CriteriaWeight::get();

        // Normalization
        foreach ($alternatives as $alternative) {
            // Get all scores for each alternative id
            $alternativeFilter = $scores->where('ida', $alternative->id)->values()->all();
            // Loop each criteria
            foreach ($criteriaweights as $key => $criteriaWeight) {
                // Get all rating value for each criteria
                $rates = $criteriaScores->map(function ($val) use ($criteriaWeight) {
                    if ($criteriaWeight->id == $val->idw) {
                        return $val->rating;
                    }
                })->toArray();

                // array_filter untuk menghilangkan value null dari fungsi map sebelumnya
                // array_values untuk mengindex ulang array agar berurutan kembali
                $rates = array_values(array_filter($rates));

                if ($criteriaWeight->type == 'benefit') {
                    $result = $alternativeFilter[$key]->rating / max($rates);
                    $msg = 'rate ' . $alternativeFilter[$key]->rating . ' max ' . max($rates) . ' res ' . $result;
                } elseif ($criteriaWeight->type == 'cost') {
                    $result = min($rates) / $alternativeFilter[$key]->rating;
                }
                $result *= $criteriaWeight->weight;
                $alternativeFilter[$key]->rating = round($result, 2);
            }
        }
        // return view('rank', compact('scores', 'alternatives', 'criteriaweights'))->with('i', 0);
        $pdf = Pdf::loadView('rank-export', compact('scores', 'alternatives', 'criteriaweights'));
        return $pdf->download('export.pdf');
    }
}
