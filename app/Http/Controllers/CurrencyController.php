<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    /**
     * @OA\Get(
     *      path="/currency/{valuteId}",
     *      description="Get info about valute by id and in range from date to date.",
     *      security={{"bearerAuth": {}}},
     *      tags={"currency"},
     *      @OA\Parameter(
     *          in="path",
     *          name="valuteId",
     *          description="For example R01010, R01035.",
     *      ),
     *      @OA\Parameter(
     *          in="query",
     *          name="from",
     *          description="Date format yyyy-mm-dd",
     *      ),
     *      @OA\Parameter(
     *          in="query",
     *          name="to",
     *          description="Date format yyyy-mm-dd",
     *      ),
     *      @OA\Response(
     *          response=200, 
     *          description="Return array for selected currency",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/Currency"),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401, 
     *          description="Unauthorized",
     *      ),
     * ),
     */
    public function getCurrencies(Request $request, $valuteId) {
        $currencies = Currency::orderBy('date', 'desc')
            ->where([
                ['valute_id', '=', $valuteId],
                ['date', '>=', $request->query('from')],
                ['date', '<=', $request->query('to')],
            ])
            ->get();

        return response()->json([
            'data' => $currencies,
        ], 200);
    }
}
