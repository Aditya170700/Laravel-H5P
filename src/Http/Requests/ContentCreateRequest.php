<?php

namespace brnysn\LaravelH5P\Http\Requests;

use brnysn\LaravelH5P\Models\H5PContent;
use brnysn\LaravelH5P\Repositories\Contracts\H5PContentRepositoryContract;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ContentCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('create', H5PContent::class);
    }

    public function rules(): array
    {
        return [
            'title'   => ['required', 'string'],
            'library' => ['required', 'string'],
            'params'  => ['required', 'string'],
            'nonce'  => ['required', 'string'],
        ];
    }
}
