<?php

namespace App\Services\Common\Code;

use App\Contracts\Common\Models\Code\CodeableContract;
use App\Contracts\Common\Services\Code\CodeContract;
use App\Enums\CodeOperationEnum;
use App\Models\Code;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class CodeService implements CodeContract
{
    /**
     * @param CodeableContract $codeable
     * @param CodeOperationEnum $operation
     * @return Model
     * @throws ValidationException
     */
    public function generateCode(CodeableContract $codeable, CodeOperationEnum $operation): Model
    {
        if ($this->checkIfExitValidCode($codeable, $operation)) {
            throw ValidationException::withMessages(['code' => 'You have valid code']);
        }

        return $codeable->codeable()->create([
            'code' => $this->codeGeneration(),
            'valid_to' => now()->addMinutes(config('common.code_lifetime')),
            'operation' => $operation,
        ]);
    }


    /**
     * @param CodeableContract $codeable
     * @param CodeOperationEnum $operation
     * @return bool
     */
    public function checkIfExitValidCode(CodeableContract $codeable, CodeOperationEnum $operation)
    {
        $exists = Code::query()
            ->where('model_id', '=', $codeable->id)
            ->where('model_type', '=', $codeable->getMorphClass())
            ->where('operation', '=', $operation)
            ->where('valid_to', '>=', now()->toDateTimeString())
            ->exists();

        return $exists;
    }

    /**
     * @param string $code
     * @param CodeableContract $codeable
     * @param CodeOperationEnum $operation
     */
    public function dropCode(string $code, CodeableContract $codeable, CodeOperationEnum $operation)
    {
        Code::query()
            ->where('model_id', '=', $codeable->id)
            ->where('model_type', '=', $codeable->getMorphClass())
            ->where('operation', '=', $operation)
            ->where('code', '=', $code)
            ->delete();
    }

    /**
     * @param int $length
     * @return string
     */
    public function codeGeneration(int $length = 6): string
    {
        $key = '';
        $chars = array_merge(
            range(0, 9),
            range('a', 'z'),
            range(0, 9),
            range('A', 'Z'),
            range(0, 9)
        );
        shuffle($chars);

        $chars = str_shuffle(str_rot13(join('', $chars)));
        $split = intval(ceil($length / 5));
        $size = strlen($chars);

        $splitSize = ceil($size / $split);
        $chunkSize = 5 + $splitSize + mt_rand(1, 5);
        $chunkArray = array();

        $chars = str_shuffle(str_repeat($chars, 2));
        $size = strlen($chars);

        while ($split != 0) {
            $strip = substr($chars, mt_rand(0, $size - $chunkSize), $chunkSize);
            array_push($chunkArray, strrev($strip));
            $split--;
        }

        foreach ($chunkArray as $set) {
            $modulus = ($length - strlen($key)) % 5;
            $adjusted = ($modulus > 0) ? $modulus : 5;

            $key .= substr($set, mt_rand(0, strlen($set) - $adjusted), $adjusted);
        }

        return str_rot13(str_shuffle($key));
    }
}
