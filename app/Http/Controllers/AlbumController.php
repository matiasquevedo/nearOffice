<?php

namespace App\Http\Controllers;

use App\Album;
use App\Imagem;
use Image;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $albums = Album::orderBy('id','ASC')->paginate(20);
        return view('admin.album.index')->with('albums',$albums);
    }

    public function indexPic()
    {
        //
        $albums = Album::orderBy('id','ASC')->paginate(20);
        return view('admin.album.indexPic')->with('albums',$albums);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        dd($request);
        $album = new Album($request->all());
        $album->user_id = \Auth::user()->id;
        // dd($album);
        $ratio = 0;

        if($request->file('image')){

            $originalImage= $request->file('image');

            $thumbnailImage = Image::make($originalImage);
            $output_file = 'img/albums/album-'.$album->slug.'_'.time().$originalImage->getClientOriginalName();
            $output_file_thumb = 'img/albums/thumbnail/album-'.$album->slug.'_'.time().$originalImage->getClientOriginalName();
            // $thumbnailImage->save($output_file);


            Storage::disk('public')->put($output_file, (string) $thumbnailImage->encode());
            // (comentado desde antes)$thumbnailImage->resize(150,150);
            // (comentado desde antes)prevent possible upsizing
            $imgSize=getimagesize($originalImage);
            $imgWidth = $imgSize['0'];
            $imgheight = $imgSize['1'];
            //verificar el cateto menor
            if($imgWidth < $imgheight){
              $ratio = (int) round(($imgWidth-1));
            }elseif($imgWidth > $imgheight){
              $ratio = (int) round(($imgheight-1));
            }elseif($imgWidth == $imgheight){
              $ratio = (int) round(($imgWidth-1));
            }
            $px = (int) round(($imgWidth/2)-($ratio/2));
            $py = (int) round(($imgheight/2)-($ratio/2));
            $thumbnailImage->crop($ratio,$ratio,$px,$py);
            $thumbnailImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            // (comentado desde antes)$thumbnailImage->resize(null, 200, function ($constraint) {
            // (comentado desde antes)    $constraint->aspectRatio();
            // (comentado desde antes)    // $constraint->upsize();
            // (comentado desde antes)});
            Storage::disk('public')->put($output_file_thumb, (string) $thumbnailImage->encode());

        }

        $album->portada = $output_file;
        $album->thumb = $output_file_thumb;
        $album->save();
        // dd($album);
        return redirect()->route('album.show',$album->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($albumSlug)
    {
        //
        $album = Album::findBySlug($albumSlug);
        return view('admin.album.show')->with('album',$album);
    }

    public function post($albumSlug)
    {
        //
        $page = Album::findBySlug($albumSlug);
        $page->state = '1';
        $page->save();
        flash('El album '.$page->titulo.' está visible')->success();
        return redirect()->back();
    }

    public function unpost($albumSlug)
    {
        //
        $page = Album::findBySlug($albumSlug);
        $page->state = '0';
        $page->save();
        flash('El album '.$page->titulo.' está oculto')->error();
        return redirect()->back();

    }

    public function addPics(Request $request){
        \Log::info('llego');
        $album = Album::find($request->album_id);
        $ratio = 0;
        // dd($album);
        $files=$request->file('images');
        if($files){
         foreach($files as $file){
             $originalImage= $file;

             $thumbnailImage = Image::make($originalImage);
             $output_file = 'img/albums/'.$album->slug.'/foto-'.$album->slug.'_'.time().$originalImage->getClientOriginalName();
             $output_file_thumb = 'img/albums/'.$album->slug.'/thumbnail/foto-'.$album->slug.'_'.time().$originalImage->getClientOriginalName();
             // $thumbnailImage->save($output_file);


             Storage::disk('public')->put($output_file, (string) $thumbnailImage->encode());
             // (comentado desde antes)$thumbnailImage->resize(150,150);
             // (comentado desde antes)prevent possible upsizing
             $imgSize=getimagesize($originalImage);
             $imgWidth = $imgSize['0'];
             $imgheight = $imgSize['1'];
             //verificar el cateto menor
             if($imgWidth < $imgheight){
               $ratio = (int) round(($imgWidth-1));
             }elseif($imgWidth > $imgheight){
               $ratio = (int) round(($imgheight-1));
             }elseif($imgWidth == $imgheight){
               $ratio = (int) round(($imgWidth-1));
             }
             $px = (int) round(($imgWidth/2)-($ratio/2));
             $py = (int) round(($imgheight/2)-($ratio/2));
             $thumbnailImage->crop($ratio,$ratio,$px,$py);
             $thumbnailImage->resize(200, 200, function ($constraint) {
                 $constraint->aspectRatio();
                 $constraint->upsize();
             });
             // (comentado desde antes)$thumbnailImage->resize(null, 200, function ($constraint) {
             // (comentado desde antes)    $constraint->aspectRatio();
             // (comentado desde antes)    // $constraint->upsize();
             // (comentado desde antes)});
             Storage::disk('public')->put($output_file_thumb, (string) $thumbnailImage->encode());
             $image = new Imagem();
             $image->image = $output_file;
             $image->thumb = $output_file_thumb;
             $image->imagetable()->associate($album);
             $image->save();
         }
        }else{
           flash("No se han seleccionado fotos")->error();
           return redirect()->route('album.show',$album->slug);
        }
        
        flash("Se han agregado imagenes")->success();
        return redirect()->route('album.show',$album->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($albumSlug)
    {
        //
        $album = Album::findBySlug($albumSlug);
        return view('admin.album.edit')->with('album',$album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($albumSlug)
    {
        //
        $album = Album::findBySlug($albumSlug);
        File::delete($album->images);
        foreach ($album->images as $image) {
            $image->delete();
        }
        flash('Se ha eliminado el album: '.$album->titulo)->error();
        return redirect()->back();
    }
}
