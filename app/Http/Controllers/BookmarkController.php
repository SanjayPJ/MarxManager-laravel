<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;

class BookmarkController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
    	$bookmarks = Bookmark::where('user_id', $request->user()->id)->get();
        return view('home')->with('bookmarks', $bookmarks);
    }

    public function store(Request $request){
    	$request->validate([
	        'name' => 'required',
	        'url' => 'required',
	    ]);
	    
	    $bookmark = new Bookmark();
	    $bookmark->name = $request->name;
	    $bookmark->url = $request->url;
	    $bookmark->description = $request->description;
	    $bookmark->user_id = $request->user()->id;
	    $bookmark->save();

	    return redirect('home')->with('status', 'Bookmark Added.');
    }

    public function destroy($id){
    	$bookmark = Bookmark::find($id);
    	$bookmark->delete();
    	return;
    }
}
