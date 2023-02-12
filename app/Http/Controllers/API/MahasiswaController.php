<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller{

    public function index(){
        $data = MahasiswaModel::all();
        return response()->json([
            'message' => 'Data berhasil ditampilkan',
            'data' => $data
        ],Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'nama' => 'required',
            'nim' => 'required|numeric',
            'alamat' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json(
                [
                    'message' => 'failed check your validation',
                    'errors' => $validator->errors()
                ],Response::HTTP_NOT_ACCEPTABLE);
        }


        $validated = $validator->validated();

        try {
            $mahasiswa = MahasiswaModel::create($validated);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'gagal tambah data',
                'errors' => $th->getMessage()
            ]);
        }

        return response()->json([
            'message' => 'success tambah data',
            'data' => [
                'id' => $mahasiswa->id,
                'created_at' => $mahasiswa->created_at,
                'other_data' => $validated
            ]
        ], Response::HTTP_OK);
    }
}
