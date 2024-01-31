<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\Orient\StoreOrientRequest;
use App\Http\Requests\api\v1\Orient\UpdateOrientRequest;
use App\Http\Resources\api\v1\Orient\IndexOrientResource;
use App\Http\Resources\api\v1\Orient\ShowOrientResource;
use App\Http\Resources\api\v1\Orient\StoreOrientResource;
use App\Http\Resources\api\v1\Orient\UpdateOrientResource;
use App\Models\v1\Orient;
use Illuminate\Http\Request;

class OrientController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Orient::all();
        return response()->json([
            'message' => 'all Orients',
            'data'=>IndexOrientResource::collection($data),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrientRequest $request)
    {
        $data= Orient::create($request->validated());
        return response()->json([
            'message' => 'Orient created successfully',
            'data' => new StoreOrientResource($data),
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
        $data=Orient::findOrFail($id);
        return response()->json([
            'message' => 'one Orient',
            'data' => new ShowOrientResource($data),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrientRequest $request, $id)
    {
        Orient::findOrFail($id)->update($request->validated());
        $data=Orient::find($id);
        return response()->json([
            'message' => 'one Orient',
            'data' => new UpdateOrientResource($data),
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
        $data=Orient::findOrFail($id);
        $data->delete();
        return response()->json([
            'message'=>'Orient deleted',
        ]);
    }
}
