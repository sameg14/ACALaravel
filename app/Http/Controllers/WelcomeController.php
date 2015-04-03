<?php

namespace App\Http\Controllers;

use App\Exceptions\LoginException;
use App\Services\LoginService;

use Illuminate\Support\Facades\App;

use App\Db\DBCommon;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $database = 'acashop';
        $db = new DBCommon($host, $user, $pass, $database, $port = 3306);

        $loginService = new LoginService();
        $loginService->setDb($db);

        try{

            $didLogin = $loginService->doLogin('skid', 'row');

        }catch(LoginException $le){

            die('Its not so bad, try again');

        } catch(\Exception $e){

            die('I caught on fire!!! Send out to NR or rollbar');
        }

        echo 'Did Login?';
        var_dump($didLogin);
        die();

//        $query = 'select * from aca_user';
//        $db->setQuery($query);
//        $results = $db->loadObjectList();
//
//        echo '<pre>';
//        print_r($results);
//        die();

//		return view('welcome');
	}

}
