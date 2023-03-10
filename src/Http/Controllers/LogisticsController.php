<?php

namespace Skima\Giglogistics\Http\Controllers;
use App\Models\User;
use Skima\Giglogistics\Traits\Gig;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LogisticsController extends Controller
{
    //
	use Gig;

	public function index(Request $request)
	{
		$data = $this->getStations();

		return response()->json(['data' => $data, 'status' => 200]);
	}
   
}
