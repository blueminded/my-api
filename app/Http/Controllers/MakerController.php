<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Maker;
use App\Vehicle;
use App\Http\Requests\CreateMakerRequest;

class MakerController extends Controller {

	function __construct() {
		$this->middleware('auth.basic.once', ['except'=>'index','show']);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$makers = Maker::simplePaginate(15);
		return response()->json(['data'=>$makers->items(), 'pagination'=>['prev'=>$makers->previousPageUrl(), 'next'=>$makers->nextPageUrl()]], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateMakerRequest $request)
	{
		$data = $request->only('name','phone');
		if($maker = Maker::create($data)){
			return response()->json(['message'=>"Maker was created with id:{$maker->id}"], 200);
		}

		return response()->json(['message'=>'There was a problem'], 422);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$maker = Maker::find($id);
		if(!$maker){
			return response()->json(['error'=>'This maker does not exist'], 404);
		}

		return response()->json(['data'=>$maker], 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateMakerRequest $request, $id)
	{

		$maker = Maker::find($id);

		if(!$maker){
			return response()->json(['error'=>'This maker does not exist'], 404);
		}

		$maker->name = $request->get('name');
		$maker->phone = $request->get('phone');
		$maker->save();

		return response()->json(['message'=>'The maker has been updated'],200);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$maker = Maker::find($id);

		if(!$maker){
			return response()->json(['error'=>'This maker does not exist'], 404);
		}

		$vehicles = $maker->vehicles;
		if(count($vehicles) > 0){
			return response()->json(['message'=>'This maker has associated vehicles. Delete his vechiles first'],409);
		}

		$maker->delete();

		return response()->json(['message'=>'This maker has deleted'],200);


	}

}
