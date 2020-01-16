<?php

namespace App\Http\Requests;

use App\Pengumuman;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePengumumanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pengumuman_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'uraian'   => [
                'required',
            ],
            'is_arsip' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
