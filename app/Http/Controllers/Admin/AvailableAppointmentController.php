<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AvailableAppointment\StoreRequest;
use App\Http\Resources\AvailableAppointmentResource;
use App\Models\AvailableAppointment;

class AvailableAppointmentController extends Controller
{
    public function index()
    {
        $data = AvailableAppointment::with("admin")->get();
        return AvailableAppointmentResource::collection($data);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->only(["start_date", "end_date", "admin_id"]);
        $create = AvailableAppointment::create($data);

        return response()->json([
            "message" => __("created_successfully"),
            "data" => new AvailableAppointmentResource($create)
        ], 201);
    }

    public function show(AvailableAppointment $availableAppointment)
    {
        return response()->json([
            "data" => new AvailableAppointmentResource($availableAppointment)
        ]);
    }

    public function delete(AvailableAppointment $availableAppointment)
    {
        $availableAppointment->delete();

        return response()->json([
            "message" => __("deleted_successfully")
        ]);
    }
}
