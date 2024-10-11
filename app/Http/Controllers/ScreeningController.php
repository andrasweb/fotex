<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ScreeningServices;
use App\Http\Resources\ScreeningResource;

class ScreeningController extends Controller
{
    protected $screeningService;

    public function __construct(ScreeningServices $service)
    {
        // Dependency Injection
        $this->screeningService = $service;
    }

    /**
     * returns every screening
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllScreenings()
    {
        $screenings = $this->screeningService->getAllScreenings();

        return response()->json(ScreeningResource::collection($screenings));
    }

    /**
     * returns a screening by ID
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getScreeningById($id = 0)
    {
        if($id == 0 || !is_int($id)){
            return response()->json([
                'error' => 'Invalid data. ID must be positive integer'
            ], 500);
        }

        $screening = $this->screeningService->findScreeningById($id);

        if(!$screening){
            return response()->json([
                'error' => 'Screening not found'
            ], 404);
        }

        return response()->json(new ScreeningResource($screening));
    }

    /**
     * creates a screening
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function newScreening(Request $request)
    {
        if(!$request->has('data') || !is_array($request->get('data')) || empty($request->get('data'))){
            return response()->json([
                'error' => 'Invalid data. Must be non-empty array'
            ], 500);
        }

        $data = $request->get('data');

        if(
            !array_key_exists('movie_id', $data) || empty($data['movie_id'])
            ||
            !array_key_exists('vacant_seats', $data) || empty($data['vacant_seats'])
        ){
            return response()->json([
                'error' => 'Invalid data. movie_id and vacant_seats properties are required'
            ], 500);
        }

        $success = $this->screeningService->createScreening($data);

        if(!$success){
            return response()->json([
                'error' => 'Screening not created'
            ], 500);
        }

        return response()->json([
            'success' => 'Screening created successfully'
        ]);
    }

    /**
     * deletes a screening
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteScreening($id = 0)
    {
        if($id == 0 || !is_int($id)){
            return response()->json([
                'error' => 'Invalid data. ID must be positive integer'
            ], 500);
        }

        $success = $this->screeningService->deleteScreeningById($id);

        if(!$success){
            return response()->json([
                'error' => 'Screening not found with id ' . $id
            ], 404);
        }

        return response()->json([
            'success' => 'Screening deleted successfully'
        ]);
    }
}
