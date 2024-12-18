<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){

        $equipments = Equipment::all();
        return view('user.equipmentlist', compact('equipments'));
    }

    public function showDetail(Equipment $equipment){
        return view('user.equipmentdetails.equipmentdetails', ['equipment'=> $equipment]);
    }
    
}
