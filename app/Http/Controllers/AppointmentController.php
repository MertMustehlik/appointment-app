<?php

namespace App\Http\Controllers;

use App\Http\Requests\Appointment\StoreRequest;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\AvailableAppointmentResource;
use App\Models\Appointment;
use App\Models\AvailableAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $data = Appointment::all();
        return response()->json([
            "data" => AppointmentResource::collection($data)
        ]);
    }

    public function store(StoreRequest $request)
    {
        $availableAppointment = AvailableAppointment::findOrFail($request->input("available_appointment_id"));

        $create = Appointment::create([
            "start_date" => $availableAppointment->start_date,
            "end_date" => $availableAppointment->end_date,
            "user_id" => Auth::id(),
            "admin_id" => $availableAppointment->admin_id
        ]);

        return response()->json([
            "message" => __("created_successfully"),
            "data" => new AppointmentResource($create->load("admin", "user"))
        ]);
    }

    public function show(Appointment $appointment)
    {
        return response()->json([
            "data" => new AppointmentResource($appointment)
        ]);
    }

    public function delete(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json([
            "message" => __("deleted_successfully")
        ]);
    }
}
