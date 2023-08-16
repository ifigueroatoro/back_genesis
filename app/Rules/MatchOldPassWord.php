<?php

namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class MatchOldPassWord implements Rule

{

	public function passes($attribute, $value)

	{
		return Hash::check($value,auth('sanctum')->user()->password);
	}

	public function message()

	{
		return 'The: attribute is match with old password.'
	}




















}
