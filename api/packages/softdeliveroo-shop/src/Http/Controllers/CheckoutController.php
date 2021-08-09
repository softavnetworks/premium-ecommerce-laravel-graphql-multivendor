<?php

namespace SoftDeliveroo\Http\Controllers;

use SoftDeliveroo\Database\Repositories\CheckoutRepository;
use SoftDeliveroo\Http\Requests\CheckoutVerifyRequest;
use Softdeliveroo\Enums\Permission;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use SoftDeliveroo\Exceptions\SoftdeliverooException;

class CheckoutController extends CoreController
{
    public $repository;

    public function __construct(CheckoutRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Verify the checkout data and calculate tax and shipping.
     *
     * @param CheckoutVerifyRequest $request
     * @return array
     */
    public function verify(CheckoutVerifyRequest $request)
    {
        $user = $request->user();
        if ($user->can(Permission::CUSTOMER)) {
            return $this->repository->verify($request);
        } else {
            throw new SoftdeliverooException('PICKBAZAR_ERROR.NOT_AUTHORIZED');
        }
    }
}
