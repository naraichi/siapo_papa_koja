<?php

namespace App\Http\Requests;

use App\Unduhan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUnduhanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('unduhan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'uraian'        => [
                'required',
            ],
            'file'          => [
                'required',
            ],
            'created_by_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
