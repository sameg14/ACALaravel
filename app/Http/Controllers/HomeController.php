<?php namespace App\Http\Controllers;

class HomeController extends Controller
{

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        die('here');

        return view('home');
    }


    public function login()
    {

        return 'Login page
        <form action="/process_login" method="post">
        <input type="text" name="username" placeholder="username"/>
        <input type="text" name="password" placeholder="password"/>
        <input type="submit" value="Login"/>
        </form>
        ';
        die();
    }

    public function process()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];

        echo '$username=' . $username;
        echo '$password=' . $password;
        die();
    }
}
