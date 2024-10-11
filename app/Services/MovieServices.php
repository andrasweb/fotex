<?php

namespace App\Services;

use App\Models\Movie;

class MovieServices
{
    public function getAllMovies()
    {
        return Movie::all();
    }

    public function findMovieById($id)
    {
        return Movie::find($id);
    }

    public function createMovie($data)
    {
        $newMovie = (new Movie());
        $newMovie->title = $data['title'];
        $newMovie->description = array_key_exists('description', $data) ? $data['description'] : '';
        $newMovie->age = array_key_exists('age', $data) ? $data['age'] : 12;
        $newMovie->language = array_key_exists('language', $data) ? $data['language'] : 'hu';

        $success = false;

        if($newMovie->save()){
            $success = true;
        }

        return $success;
    }

    public function deleteMovieById($id)
    {
        $movie = Movie::find($id);
        $success = false;

        if(!empty($movie)){
            $movie->delete();
            $success = true;
        }

        return $success;
    }
}
