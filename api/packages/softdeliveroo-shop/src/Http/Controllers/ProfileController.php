<?php

namespace SoftDeliveroo\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SoftDeliveroo\Database\Models\Profile;
use SoftDeliveroo\Database\Repositories\ProfileRepository;
use SoftDeliveroo\Exceptions\SoftdeliverooException;
use SoftDeliveroo\Http\Requests\ProfileRequest;
use Prettus\Validator\Exceptions\ValidatorException;

class ProfileController extends CoreController
{
    public $repository;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Collection|Profile
     */
    public function index(Request $request)
    {
        return $this->repository->with('customer')->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProfileRequest $request
     * @return mixed
     * @throws ValidatorException
     */
    public function store(ProfileRequest $request)
    {
        $validatedData = $request->all();
        return $this->repository->create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        try {
            return $this->repository->with('customer')->findOrFail($id);
        } catch (\Exception $e) {
            throw new SoftdeliverooException('PICKBAZAR_ERROR.NOT_FOUND');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfileRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(ProfileRequest $request, $id)
    {
        try {
            $validatedData = $request->all();
            return $this->repository->findOrFail($id)->update($validatedData);
        } catch (\Exception $e) {
            throw new SoftdeliverooException('PICKBAZAR_ERROR.NOT_FOUND');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            return $this->repository->findOrFail($id)->delete();
        } catch (\Exception $e) {
            throw new SoftdeliverooException('PICKBAZAR_ERROR.NOT_FOUND');
        }
    }
}
