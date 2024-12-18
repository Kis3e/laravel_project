<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    // Display a list of all equipment
    public function index()
    {
        $equipments = Equipment::all(); // Retrieve all equipment records
        return view('modules.equipments.equipmentlist', compact('equipments')); // Pass data to the view
    }

    // Show the form for creating new equipment
    public function create()
    {
        return view('modules.equipments.addequipment'); // Display the add equipment form
    }

    // Store a newly created equipment in the database
    public function store(Request $request)
    {
        $data = $request->validate([
            'serial_number' => 'required|string|max:255',
            'equipment_name' => 'required|string|max:255',
            'equipment_price' => 'required|numeric|between:0,9999999999.99',
            'date_purchased' => 'required|date',
            'equipment_description' => 'nullable|string',
            'status' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('equipment_images', 'public');
            $data['image'] = $imagePath; // Store the image path in the database
        }

        Equipment::create($data); // Save the new equipment record

        return redirect()->route('equipment.index')->with('success', 'Equipment added successfully.');
    } 


    // Show the form for editing a specific equipment
    public function edit(Equipment $equipment)
    {
        return view('modules.equipments.editequipment', compact('equipment')); // Display the edit equipment form
    }

    // Update the specified equipment in the database
    public function update(Request $request, Equipment $equipment)
    {
        $data = $request->validate([
            'serial_number' => 'required|string|max:255',
            'equipment_name' => 'required|string|max:255',
            'equipment_price' => 'required|numeric|between:0,9999999999.99',
            'date_purchased' => 'required|date',
            'equipment_description' => 'nullable|string',
            'status' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $equipment->update($data); // Update the equipment record

        return redirect()->route('equipment.index')->with('success', 'Equipment updated successfully.');
    }

    // Delete the specified equipment from the database
    public function delete(Equipment $equipment)
    {
        $equipment->delete(); // Delete the equipment record

        return redirect()->route('equipment.index')->with('success', 'Equipment deleted successfully.');
    }

    // Display the details of a specific equipment
    public function showDetail(Equipment $equipment)
    {
        return view('modules.equipments.equipmentdetails.equipmentdetails', compact('equipment')); // Display equipment details
    }
}
