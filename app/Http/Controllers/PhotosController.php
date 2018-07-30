<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Album;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create($album_id) {
        return view('admin.photos.create')->with('album_id',$album_id);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'image|max:1999',
        ]);

        //get filename with extension
        $fileNameWithExt =  $request->file('photo')->getClientOriginalName();

        //get just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        //gte extension
        $extension = $request->file('photo')->getClientOriginalExtension();

        //create new filename
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        //upload image
        $path = $request->file('photo')->storeAs('public/photos/'.$request->album_id, $fileNameToStore);
        
        //upload album
        $photo = new Photo;
        $photo->album_id = $request->album_id;
        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $fileNameToStore;

        $photo->save();

        return redirect()->route('albums.show',$request->album_id)->with('success','Photo uploaded');
    }
    public function show($id) {
        $photo = Photo::find($id);
        return view('admin.photos.show')->with('photo',$photo);
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
           'title' => 'required|max:60',
           'description' => 'sometimes|max:255'
        ]);

        $photo = Photo::find($id);
        
        //update description and title
        $photo->title = $request->title;
        $photo->description = $request->description;

        $photo->save();

        return redirect()->route('albums.show',$photo->album_id)->with('success','Photo updated');
    }

    public function destroy($id) {
        $photo = Photo::find($id);

        $album = Album::find($photo->album_id);

        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)) {
            $photo->delete();

            return redirect()->route('albums.show',$album->id)->with('success','photo deleted');
        }
    }
}
