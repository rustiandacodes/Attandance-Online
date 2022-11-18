<?php

namespace App\Http\Controllers;

use App\Models\Master_shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Str;

$json = file_get_contents("php://input");
$body = json_decode($json);


class AbsensiController extends Controller
{
    public function index(){

        date_default_timezone_set('Asia/Jakarta');
        $time = date('H:i:s');
        $today = date('d/m/Y');
        $yesterday = date('d/m/Y', strtotime("yesterday"));
        $filter_picture = Master_shift::where('user_id', auth()->user()->id)->where('date', $today)->get('picture');

        // dd($filter_picture);

        return view('home', [

            'user_id' => auth()->user()->id,
            'query' => $filter_picture,
            'name' => auth()->user()->name,
            'today' => $today,
            'yesterday' => $yesterday,
            'time' => $time,
        ]);
    }

    public function in(Request $request){

      
        $validatedData = $request->validate([
            "in" => "required",
        ]);

        $image_64 = $request->picture; 

        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
      
        $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
      
        $image = str_replace($replace, '', $image_64); 
      
        $image = str_replace(' ', '+', $image); 
      
        $imageName = Str::random(10).'.'.$extension;
      
        Storage::disk('public')->put($imageName, base64_decode($image));

        $validatedData["picture"] = $imageName;

        $userLong = (float) $request->longitude;
        $userLat = (float) $request->latitude;

        if ($request->date === null) {
            return redirect("/home")->with('failed', "Anda belum memlilih tanggal absen");
        }
        
        if ($request->picture === null) {
            return redirect("/home")->with('failed', "Anda belum mengambil foto");
        }

        if( !($userLong > 106.5397 && $userLong < 106.5400) || ($userLat > -6.1684 && $userLat < -6.1687) ) {

            return redirect("/home")->with('failed', "Gagal Absen, Anda tidak berada di lokasi kerja");
        }

        Master_shift::where('date', $request->date)->where('user_id' , auth()->user()->id)->update($validatedData);

        return redirect("/home")->with('success', "Anda berhasil absen masuk");
    }

    public function out(Request $request){
        
        $validatedData = $request->validate([
            "out" => "required",
        ]);

        if ($request->date === null) {
            return redirect("/home")->with('failed', "Anda belum memlilih tanggal absen");
        }

        Master_shift::where('date', $request->date)->where('user_id' , auth()->user()->id)->update($validatedData);
        
        return redirect("/home")->with('success', "Anda berhasil absen keluar");

    }
}




