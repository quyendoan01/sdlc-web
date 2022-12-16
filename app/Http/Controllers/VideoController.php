<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Video;
use App\Models\Library;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function listVideo()
    {
        $listvideos = Video::all();
        $videos = Video::inRandomOrder()->limit(3)->get();
        return view('home', compact('videos', 'listvideos'));
    }
    public function listVideoadmin()
    {
        $videos = Video::all();
        return view('admin', compact('videos'));
    }
    public function add_video(Request $request)
    {

        if ($request->isMethod('POST')) {
            if ($request->hasFile('filename')){
                $newVideo = new Video();
                $newVideo->name = $request->name;

                $music_file = $request->file('filename');
                $filename=$_FILES['filename']['name'];
                $location = public_path('audio/' .$filename);
                $music_file->move($location, $filename);
                $newVideo->video_url = $filename;

                $newVideo->video_image = $request->video_image;
                $newVideo->author = $request->author;
                $newVideo->description = $request->description;
                $newVideo->category = $request->category;
                $newVideo->save();
                return redirect()->route('managementadmin')
                    ->with('success', 'Video created successfully!');
            }
            else{
                return redirect()->route('managementadmin')
                ->with('danger', 'Failed!');
            }
        } else {
            return redirect()->route('managementadmin')
                ->with('danger', 'Failed!');
        }

    }
    public function play_songa($id)
    {
        $videos = Video::all();
        $videosong = Video::find($id);

        return view('admin', compact('videos'), ['videosong' => $videosong]);
    }
    public function play_song($id)
    {
        $videos = Video::inRandomOrder()->limit(3)->get();
        $listvideos = Video::all();
        $videosong = Video::find($id);

        $count = DB::table('videos') -> where('id', $id)->increment('counts_videos', 1);

        return view('home', compact('videos','listvideos'), ['videosong' => $videosong]);
    }
    public function backsong($id)
    {
        $videos = Video::inRandomOrder()->limit(3)->get();
        $listvideos = Video::all();
        $videosong = DB::table('videos') -> where('id', '<', $id)->orderBy('id','desc')->first();

        $count = DB::table('videos') -> where('id', '<', $id)->orderBy('id','desc')->limit(1)->increment('counts_videos', 1);

        return view('home', compact('videos','listvideos'), ['videosong' => $videosong]);
    }
    public function nextsong($id)
    {
        $videos = Video::inRandomOrder()->limit(3)->get();
        $listvideos = Video::all();
        $videosong = DB::table('videos') -> where('id', '>', $id)->first();

        $count = DB::table('videos') -> where('id', '>', $id)->limit(1)->increment('counts_videos', 1);

        return view('home', compact('videos','listvideos'), ['videosong' => $videosong]);
    }

    public function trending_song($id)
    {
        $listtrend = DB::table('videos')->orderBy('counts_videos','desc')->get();
        $videosong = Video::find($id);
        $count = DB::table('videos') -> where('id', $id)->increment('counts_videos', 1);

        return view('trending', compact('listtrend'), ['videosong' => $videosong]);
    }
    public function newcd_song($id)
    {
        $newcda = DB::table('videos')
            ->orderBy('updated_at','desc')
            ->get();
        $videosong = Video::find($id);
        $count = DB::table('videos') -> where('id', $id)->increment('counts_videos', 1);

        return view('newcd', compact('newcda'), ['videosong' => $videosong]);
    }
    public function cate_song($id)
    {
        $group = DB::table('videos')->selectRaw('category')->distinct()->get();
        $videosong = Video::find($id);
        $count = DB::table('videos') -> where('id', $id)->increment('counts_videos', 1);

        return view('category', compact('group'), ['videosong' => $videosong]);
    }
    public function playlist_song($id)
    {
        $group = DB::table('videos')->selectRaw('category')->distinct()->get();
        $videosong = Video::find($id);
        $count = DB::table('videos') -> where('id', $id)->increment('counts_videos', 1);

        $uid = Auth::user()->id;
        $uservideo = Library::query()
            ->where('uid', '=', "$uid")
            ->where('library_name', 'LIKE', "%Liked Songs%")
            ->get();

        return view('playlist', compact('group','uservideo'), ['videosong' => $videosong]);
    }

    public function video_edit(Request $request)
    {
        if ($request->isMethod('POST')) {
            $video = Video::find($request->id);
            if ($video != null) {
                $video->name = $request->name;

                $music_file = $request->file('filename');
                $filename=$_FILES['filename']['name'];
                $location = public_path('audio/' .$filename);
                $music_file->move($location, $filename);
                $video->video_url = $filename;

                $video->video_image = $request->video_image;
                $video->author = $request->author;
                $video->description = $request->description;
                $video->save();
                return redirect()->route('managementadmin')
                    ->with('success', 'Video update successful!');
            } else {
                return redirect()->route('managementadmin')
                    ->with('danger', 'Video not updated');
            }
        }
    }
    public function video_delete($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('managementadmin')
            ->with('success', 'Video delete successful!');
    }

    public function searchvideo(Request $request)
    {
        $search = $request->search;
        $listvideos = Video::all();
        $videos = Video::inRandomOrder()->limit(3)->get();

        $videosa = Video::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orwhere('category','LIKE',"%{$search}%")
            ->get();

        return view('home', compact('videosa', 'listvideos', 'videos'), ['successms' => '' . $search]);
    }
    public function searchvideoad(Request $request)
    {
        $search = $request->search;
        $listvideos = Video::all();
        $videos = Video::inRandomOrder()->limit(3)->get();

        $videosa = Video::query()
            ->where('name', 'LIKE', "%{$search}%")
                //->orwhere('category','LIKE',"%{$search}%")
            ->get();

        return view('admin', compact('videosa', 'listvideos', 'videos'), ['successms' => '' . $search]);
    }
}
