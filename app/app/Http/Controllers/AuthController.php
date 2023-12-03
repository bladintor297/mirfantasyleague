<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            $user = User::find (Auth::user()->id);
            
            // Store user ID and name in the session
            session()->put('user_id', $user->id);
            session()->put('user_name', $user->username);
            session()->put('user_image', $user->team_logo);


            return redirect()->intended('welcome')
                        ->withSuccess('Signed in');
        }
    
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        $users = User::get();
        return view('register')->with(['users'=>$users]);
    }
    
    public function customRegistration(Request $request)
    {
        
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'username' => 'required|unique:users',
        //     'password' => 'required|min:6',
        //     'phone' => 'required',
        //     'team_name' => 'required',
        //     'team_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        // ]);
        
        $data = $request->all();

        // // return $request->all();

        
        User::create([
            'name' => $data['fullname'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'team_name' => $data['team_name'],
            'team_logo' =>  $request->input('username'). '.' . $request->team_logo->extension()
        ]);

        $path = public_path('assets/img/profile/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $imageName = $request->input('username'). '.' . $request->team_logo->extension();
        $request->team_logo->move($path, $imageName);

        $message = "Registration successfull";

        return redirect("login")->with('success', $message);
    }

    
    public function dashboard()
    {
        if(Auth::check()){
            return view('welcome');
            
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('welcome');
    }
}