<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MovieServices;
use App\Http\Resources\MovieResource;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieServices $service)
    {
        // Dependency Injection
        $this->movieService = $service;
    }

    /**
     * returns every movie
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllMovies()
    {
        $movies = $this->movieService->getAllMovies();

        return response()->json(MovieResource::collection($movies));
    }

    /**
     * returns a movie by ID
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMovieById($id = 0)
    {
        if($id == 0 || !is_int($id)){
            return response()->json([
                'error' => 'Invalid data. ID must be positive integer'
            ], 500);
        }

        $movie = $this->movieService->findMovieById($id);

        if(!$movie){
            return response()->json([
                'error' => 'Movie not found'
            ], 404);
        }

        return response()->json(new MovieResource($movie));
    }

    /**
     * creates a new movie
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function newMovie(Request $request)
    {
        if(!$request->has('data') || !is_array($request->get('data')) || empty($request->get('data'))){
            return response()->json([
                'error' => 'Invalid data. Must be non-empty array'
            ], 500);
        }

        $data = $request->get('data');

        if(!array_key_exists('title', $data) || empty($data['title'])){
            return response()->json([
                'error' => 'Invalid data. Title is required'
            ], 500);
        }

        $success = $this->movieService->createMovie($data);

        if(!$success){
            return response()->json([
                'error' => 'Movie not created'
            ], 500);
        }

        return response()->json([
            'success' => 'Movie created successfully'
        ]);
    }

    /**
     * deletes a movie
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMovie($id = 0)
    {
        if($id == 0 || !is_int($id)){
            return response()->json([
                'error' => 'Invalid data. ID must be positive integer'
            ], 500);
        }

        $success = $this->movieService->deleteMovieById($id);

        if(!$success){
            return response()->json([
                'error' => 'Movie not found with id ' . $id
            ], 404);
        }

        return response()->json([
            'success' => 'Movie deleted successfully'
        ]);
    }
}
