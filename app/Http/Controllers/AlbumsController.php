<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Photo;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    public function index() {
        $albums = Album::with('Photos')->get();
    	return view('admin.albums.index')->with('albums',$albums);
    }

    public function create() {
    	return view('admin.albums.create');
    }
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image|max:1999',
        ]);

        //get filename with extension
        $fileNameWithExt =  $request->file('cover_image')->getClientOriginalName();

        //get just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        //gte extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        //create new filename
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        //upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers', $fileNameToStore);
        
        //create album
        $album = new Album;
        $album->name = $request->name;
        $album->description = $request->description;
        $album->cover_image = $fileNameToStore;

        $album->save();

        return redirect()->route('albums.index')->with('success','Album created');
    }
    public function destroy($id) {
        $album = Album::with('Photos')->find($id);

        foreach ($album->photos as $photo) {
            if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)) {
                $photo->delete();
            }
            //file_put_contents('kecske.txt',$photo->title,FILE_APPEND);
        }

        if(Storage::delete('public/album_covers/'.$album->cover_image)) {
            $album->delete();
            return redirect()->route('albums.index')->with('success','Album deleted');
        }
    }

    public function show($id) {
        $album = Album::with('Photos')->find($id);
        return view('admin.albums.show')->with('album',$album);
    }
}