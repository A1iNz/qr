<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Data;
class DataController extends Controller
{
    public function index(){
        $data = Data::all();
        return view ('welcome', ['data' => $data]);
    }
    public function store(Request $request){
        $data = new Data;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        return back();
    }
    public function generate ($id)
    {
        $data = Data::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($data->name);
        return view('qrcode',compact('qrcode'));
    }
    
    /**Direct Ke SMS**/
    // public function generate ($id)
    // {
    //     $data = Data::findOrFail($id);
    //     $qrcode = QrCode::size(400)->email($data->email);
    //     return view('qrcode',compact('qrcode'));
    // }

    /**Direct Ke SMS**/
    // public function generate ($id)
    // {
    //     $data = Data::findOrFail($id);
    //     $qrcode = QrCode::size(400)->SMS($data->phone);
    //     return view('qrcode',compact('qrcode'));
    // }

    /**Langsung Direct Ke Telepon**/
    // public function generate ($id)
    // {
    //     $data = Data::findOrFail($id);
    //     $qrcode = QrCode::size(400)->phoneNumber($data->phone);
    //     return view('qrcode',compact('qrcode'));
    // }
}