<?php

function jsonResponse($code, $data = [], $status = 200)
{
  return response()->json([
    'error_code' => $code,
    'data' => $data,
  ], $status);
}

