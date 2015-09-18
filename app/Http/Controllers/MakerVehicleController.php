<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Maker;
use App\Vehicle;
use App\Http\Requests\StoreVehicleRequest;

class MakerVehicleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$maker = Maker::find($id);

		if(!$maker){
			return response()->json(['error'=>'This maker does not exist'], 404);
		}

		return response()->json(['data'=>$maker->vehicles], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreVehicleRequest $request, $maker_id)
	{
		$maker = Maker::find($maker_id);

		if(!$maker){
			return response()->json(['message'=>'This maker does not exist'], 422);
		}

		$data = $request->all();

		$maker->vehicles()->create($data);

		return response()->json(['message'=>'The vehicle was created'],200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, $vehicle_id)
	{
		$maker = Maker::find($id);

		if(!$maker){
			return response()->json(['error'=>'This maker does not exist'], 404);
		}

		$vehicle =  $maker->vehicles->find($vehicle_id);
		if(!$vehicle){
			return response()->json(['error'=>'This vehicle does not exist for this maker'], 404);
		}

		return response()->json(['data'=>$vehicle], 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(StoreVehicleRequest $request, $maker_id, $vehicle_id)
	{
		$maker = Maker::find($maker_id);

		if(!$maker){
			return response()->json(['error'=>'This maker does not exist'], 404);
		}

		$vehicle =  $maker->vehicles->find($vehicle_id);

		if(!$vehicle){
			return response()->json(['error'=>'This vehicle does not exist for this maker'], 404);
		}

		$vehicle->color = $request->get('color');
		$vehicle->power = $request->get('power');
		$vehicle->capacity = $request->get('capacity');
		$vehicle->speed = $request->get('speed');
		$vehicle->save();

		return response()->json(['message'=>'The vehicle was updated'],200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($makerId, $vehicleId)
	{
		$maker = Maker::find($makerId);

		if(!$maker){
			return response()->json(['error'=>'This maker does not exist'], 404);
		}

		$vehicle = $maker->vehicles->find($vehicleId);

		if(!$vehicle){
			return response()->json(['message'=>'This vehicle does not exits'],422);
		}

		$vehicle->delete();

		return response()->json(['message'=>'This vehicle has been deleted'],200);


	}

}
