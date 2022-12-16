<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Dotenv\Parser\ParserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Video;
use App\Models\Cart;
use App\Models\uvalue;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function admin()
    {
        if(Auth::user()->role == true){
            return view('admin');
        }
        else{
            return view('home');
        }

    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function cart()
    {
        $uid = Auth::user()->id;
        $usercart = DB::table('cart')
            ->where('uid','=', $uid)
            ->where('buyed',false)
            ->get();
        return view('cart',['usercart' => $usercart]);
    }
    public function trending()
    {
        $listtrend = DB::table('videos')->orderBy('counts_videos', 'desc')->get();

        return view('trending', ['listtrend' => $listtrend]);
    }

    public function library($id)
    {
        $library = DB::table('library')->where('uid', $id)->first();
        return view('library', ['library' => $library]);
    }

    public function newcd()
    {
        $newcda = DB::table('videos')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('newcd', compact('newcda'));
    }

    public function category()
    {
        $group = DB::table('videos')->selectRaw('category')->distinct()->get();
        return view('category', compact('group'));
    }

    public function ticketUsd(){
        return view('ticketUsd');
    }

    public function mana_admin()
    {
        $listadmin = DB::table('users')->where('role', '=', true)->get();
        return view('manaadmin', compact('listadmin'));
    }
    public function mana_user()
    {
        $listuser = DB::table('users')->where('role', '=', false)->get();
        return view('manauser', compact('listuser'));
    }

    public function add_admin()
    {
        return view('add_admin');
    }


    public function add()
    {
        return view('add');
    }

    public function edit($id)
    {
        $videos = Video::find($id);
        return view('add', ['videos' => $videos]);
    }

    public function add_library($id)
    {
        $uid = Auth::user()->id;
        $video = DB::table('library')
            ->where('vid', $id)->where('uid', $uid)
            ->first();

        if (!$video) {
            $newLVideo = new Library();
            $newLVideo->uid = $uid;
            $newLVideo->vid = $id;
            $newLVideo->library_name = "Liked Songs";
            $newLVideo->save();
            return redirect()->route('add2')->with('add', 'Add song succesful!');
        } else {
            return redirect()->route('add2')->with('add', 'You added this song!');
        }
    }
    public function add_cart($id){
        $uid = Auth::user()->id;
        $video = DB::table('cart')
            ->where('vid', $id)->where('uid', $uid)
            ->first();

        if (!$video) {
            $newCVideo = new Cart();
            $newCVideo->uid = $uid;
            $newCVideo->vid = $id;
            $newCVideo->save();
            return redirect()->route('add2')->with('add', 'Add song succesful!');
        } else {
            return redirect()->route('add2')->with('add', 'You added this song!');
        }
    }

    public function playlist($library_name)
    {

        $uid = Auth::user()->id;
        $uservideo = Library::query()
            ->where('uid', '=', "$uid")
            ->where('library_name', 'LIKE', "%{$library_name}%")
            ->get();

        // $video = Video::query()
        //     ->where('id', '=', "$uservideo->vid")
        //     ->get();
        return view('playlist', compact('uservideo', 'uid', 'library_name'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function auth_login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::user()->role == true) {
                return redirect()->route('managementadmin');
            } else {
                return redirect()->route('add2');
            }
        } else {
            return redirect()->route('auth.login')->with('message', 'Invalid username or password!');
        }
    }

    public function auth_register(Request $request)
    {
        if ($request->isMethod('POST')) {
            $user = DB::table('users')->where('email', $request->email)->first();

            if (!$user) {
                $newUser = new User();
                $newUser->email = $request->email;
                $newUser->name = $request->name;
                $newUser->password = $request->password;
                $newUser->save();
                return redirect()->route('auth.login')->with('successf', 'Register succesful!');
            } else {
                return redirect()->route('auth.register')->with('message', 'Account exist!');
            }

        }
    }
    public function add_admin_auth(Request $request)
    {
        if ($request->isMethod('POST')) {
            $user = DB::table('users')->where('email', $request->email)->first();

            if (!$user) {
                $newUser = new User();
                $newUser->email = $request->email;
                $newUser->name = $request->name;
                $newUser->password = $request->password;
                $newUser->role = true;
                $newUser->save();
                return redirect()->route('mana_admin')
                    ->with('success', 'Add account successful!');
            } else {
                return redirect()->route('mana_admin')
                    ->with('danger', 'Account exist!');
            }

        }
    }
    public function user_delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('mana_admin')
            ->with('success', 'Delete account successful!');
    }

    public function user_edit($id)
    {
        $videos = User::find($id);
        return view('add_admin', ['videos' => $videos]);
    }
    public function user_edit_auth(Request $request)
    {
        if ($request->isMethod('POST')) {
            $user = User::find($request->id);
            if ($user != null) {

                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->save();
                return redirect()->route('mana_admin')
                    ->with('success', 'Account update successful!');
            } else {
                return redirect()->route('mana_admin')
                    ->with('danger', 'Account not updated');
            }
        }
    }
    public function delSongLib(Request $request)
    {
        $uid = Auth::user()->id;
        $vid = $request->vid;

        $userv = DB::table('library')->where('uid', $uid)->where('vid',$vid)->delete();

        $library_name = "Liked Songs";
        $uservideo = Library::query()
            ->where('uid', '=', "$uid")
            ->where('library_name', 'LIKE', "%{$library_name}%")
            ->get();

        // $video = Video::query()
        //     ->where('id', '=', "$uservideo->vid")
        //     ->get();
        return view('playlist', compact('uservideo', 'uid', 'library_name'));
    }
    public function delSongCart($id)
    {
        $uid = Auth::user()->id;

        DB::table('cart')->where('uid', $uid)->where('vid',$id)->delete();
        $usercart = DB::table('cart')
        ->where('uid','=', $uid)
        ->get();

        return view('cart',['usercart' => $usercart]);
    }

    public function usdPlus(Request $request){
        $uid = Auth::user()->id;
        $user = DB::table('uvalue')->where('uid', $uid)->first();

        if(!$user){
            $newuser = new uvalue();
            $newuser->uid = $uid;
            $newuser->usd = $request->usd;
            $newuser->save();
        }
        else{
            $usd = DB::table('uvalue') -> where('uid', $uid)->increment('usd', $request->usd);
        }

        return redirect()->route('ticketUsd');
    }

    public function ticketPlus(Request $request){
        $uid = Auth::user()->id;
        $user = DB::table('uvalue')->where('uid', $uid)->first();

        if(!$user){
            $newuser = new uvalue();
            $newuser->uid = $uid;
            $newuser->save();
        }
        else{
            if($user->usd < $request->usd){
                $mes = "Not enough Usd";
            }
            else{
                DB::table('uvalue') -> where('uid', $uid)->increment('tickets', $request->ticket);
                DB::table('uvalue') -> where('uid', $uid)->decrement('usd', $request->usd);
                $mes = "Successful!";
            }
        }

        return redirect()->route('ticketUsd',compact('mes'));
    }

}
?>
