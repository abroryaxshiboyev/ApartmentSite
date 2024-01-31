<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\District\StoreDistrictRequest;
use App\Http\Requests\api\v1\District\UpdateDistrictRequest;

use App\Http\Resources\api\v1\District\IndexDistrictResource;
use App\Http\Resources\api\v1\District\ShowDistrictResource;
use App\Http\Resources\api\v1\District\StoreDistrictResource;
use App\Http\Resources\api\v1\District\UpdateDistrictResource;
use App\Models\v1\District;

use function PHPUnit\Framework\returnSelf;

class DistrictController extends Controller
{
   
    public function index()
    {
        $data=District::all();
        return response()->json([
            'message' =>'all Districts',
            'data' =>IndexDistrictResource::collection($data)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistrictRequest $request)
    {
        $data=District::create($request->validated());
        return response()->json([
            'message' => 'District created',
            'data'=>new StoreDistrictResource($data)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=District::findOrFail($id);
        return response()->json([
            'message' => 'One District',
            'data'=>new ShowDistrictResource($data),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDistrictRequest $request, $id)
    {
        District::findOrFail($id)->update($request->validated());
        $data=District::find($id);
        return response()->json([
            'message' => 'One District',
            'data'=>new UpdateDistrictResource($data),
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
        $data=District::findOrFail($id);
        $data->delete();
        return response()->json([
            'message'=>'District deleted',
        ]);
    }
}
