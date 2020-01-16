<?php

namespace App\Http\Requests;

use App\Skpd;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSkpdRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('skpd_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nm_skpd'     => [
                'required',
            ],
            'is_sub_unit' => [
                'required',
            ],
            'sub_unit'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'is_aktif'    => [
                'required',
            ],
        ];
    }
}
