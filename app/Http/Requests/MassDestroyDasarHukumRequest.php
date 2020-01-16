<?php

namespace App\Http\Requests;

use App\DasarHukum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDasarHukumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dasar_hukum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dasar_hukums,id',
        ];
    }
}
