<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Maker;
use App\Vehicle;

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
	public function store()
	{
		//
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
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
