<?php

namespace App\Http\Requests\Admin\AvailableAppointment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "start_date" => [
                "required",
                "date_format:Y-m-d H:i:s",
                function ($attribute, $value, $fail) {
                    if (strtotime($value) < now()->timestamp) {
                        $fail(__("validation.the_start_date_must_be_a_future_date"));
                    }
                },
            ],
            "end_date" => [
                "required",
                "date_format:Y-m-d H:i:s",
                function ($attribute, $value, $fail) {
                    $startDate = $this->input('start_date');

                    if (strtotime($value) <= strtotime($startDate)) {
                        $fail(__("validation.the_end_date_must_be_after_the_start_date"));
                    }

                    if (strtotime($value) - strtotime($startDate) < 300) {
                        $fail(__("validation.the_duration_between_start_date_and_end_date_must_be_at_least_5_minute"));
                    }
                },
            ],
            "admin_id" => [
                "required",
                Rule::exists("admins", "id")
            ]
        ];
    }
}
