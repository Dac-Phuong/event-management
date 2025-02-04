<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait RequestTrait
{
  protected function failedValidation(Validator $validator)
  {
    $error = $validator->errors()->first();
    throw new HttpResponseException(response()->json(['error_code' => -1, 'data' => $error], 200));
  }
}

