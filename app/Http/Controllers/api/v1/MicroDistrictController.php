<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\MicroDistrict\StoreMicroDistrictRequest;
use App\Http\Requests\api\v1\MicroDistrict\UpdateMicroDistrictRequest;
use App\Http\Resources\api\v1\MicroDistrict\IndexMicroDistrictResource;
use App\Http\Resources\api\v1\MicroDistrict\ShowMicroDistrictResource;
use App\Http\Resources\api\v1\MicroDistrict\StoreMicroDistrictResource;
use App\Http\Resources\api\v1\MicroDistrict\UpdateMicroDistrictResource;
use App\Models\v1\MicroDistrict;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class MicroDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=MicroDistrict::all();
        return response()->json([
            'message' => 'all MicroDistricts',
            'data'=>IndexMicroDistrictResource::collection($data),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMicroDistrictRequest $request)
    {
        $data=MicroDistrict::create($request->validated());
        return response()->json([
            'message' => 'MicroDistrict created successfully',
            'data' => new StoreMicroDistrictResource($data),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=MicroDistrict::findOrFail($id);
        return response()->json([
            'message' => 'one MicroDistrict',
            'data' => new ShowMicroDistrictResource($data),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMicroDistrictRequest $request, $id)
    {
        MicroDistrict::findOrFail($id)->update($request->validated());
        $data=MicroDistrict::find($id);
        return response()->json([
            'message' => 'one MicroDistrict',
            'data' => new UpdateMicroDistrictResource($data),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=MicroDistrict::findOrFail($id);
        $data->delete();
        return response()->json([
            'message'=>'MicroDistrict deleted',
        ]);
    }
}
