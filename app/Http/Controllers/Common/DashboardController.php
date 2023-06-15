<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;
use \stdClass;
use Response;
use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use DB;
use Auth;
use App\Model\Admin\Config;
use App\Model\Admin\Product;
use App\Model\Admin\Post;
use App\Model\Common\User;

use Spatie\Analytics\Period;
use Analytics;
use App\Libraries\GoogleAnalytics;
use App\Model\Admin\OrderDetail;
use App\Model\Admin\Order;

class DashboardController extends Controller
{
	protected $view = 'admin.dashboard';

	public function index()
	{
		$data = [];
		$g7_ids = [];
		$data['orders'] = Order::whereDate('created_at',Carbon::now())->count();
		$data['total_price'] = OrderDetail::whereDate('created_at',Carbon::today())
								->sum('price');



		$startDate =  \Carbon\Carbon::now()->startOfMonth();
		$endDate = new \Carbon\Carbon('now');


		// dd($data_analytics);
		$sales = $this->getOrderByDay();
		// dd($sales);

		return view($this->view.'.dash', compact('data','sales'));
	}

	public function getOrderByDay()
		{
			$select = [
				DB::raw("SUM(price) as total_price"),
				DB::raw("DATE(created_at) as day"),
			];
			$result = OrderDetail::select($select)->whereDate('created_at', '>',
					Carbon::now()->subDays(10))->groupBy([DB::raw('DATE(created_at)')])->get();

			return $result;
		}
}
