<?php

namespace App\Services;

use App\Models\Screening;

class ScreeningServices
{
    public function getAllScreenings()
    {
        return Screening::all();
    }

    public function findScreeningById($id)
    {
        return Screening::find($id);
    }

    public function createScreening($data)
    {
        $newScreening = (new Screening());
        $newScreening->movie_id = $data['movie_id'];
        $newScreening->vacant_seats = $data['vacant_seats'];
        $newScreening->date = array_key_exists('date', $data) ? $data['date'] : date('Y-m-d H:i:s');

        $success = false;

        if($newScreening->save()){
            $success = true;
        }

        return $success;
    }

    public function deleteScreeningById($id)
    {
        $screening = Screening::find($id);
        $success = false;

        if(!empty($screening)){
            $screening->delete();
            $success = true;
        }

        return $success;
    }
}
