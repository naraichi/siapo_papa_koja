<?php

namespace App\Http\Requests;

use App\DasarHukum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDasarHukumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dasar_hukum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'uraian' => [
                'required',
            ],
            'nomor'  => [
                'required',
            ],
            'tahun'  => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
