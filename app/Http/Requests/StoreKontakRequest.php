<?php

namespace App\Http\Requests;

use App\Kontak;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreKontakRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kontak_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'uraian'        => [
                'required',
            ],
            'detail'        => [
                'required',
            ],
            'created_by_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
