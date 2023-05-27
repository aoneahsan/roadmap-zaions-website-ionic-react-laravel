<?php

namespace App\Http\Controllers\Zaions\ZLink\ShortLinks;

use App\Http\Controllers\Controller;
use App\Http\Resources\Zaions\ZLink\ShortLinks\CustomDomainResource;
use App\Models\Default\WorkSpace;
use App\Models\ZLink\ShortLinks\CustomDomain;
use App\Models\ZLink\ShortLinks\ShortLink;
use App\Zaions\Helpers\ZHelpers;
use Illuminate\Http\Request;

class CustomDomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $workspaceId, $shortLinkId)
    {
        try {
            $userId = $request->user()->id;
            // getting workspace
            $workspace = WorkSpace::where('uniqueId', $workspaceId)->where('userId', $userId)->first();

            // getting Short-link in workspace
            $ShortLink = ShortLink::where('uniqueId', $shortLinkId)->where('userId', $userId)->where('workspaceId', $workspace->id)->first();

            if (!$ShortLink) {
                return ZHelpers::sendBackInvalidParamsResponse([
                    "item" => ['No Short-link found!']
                ]);
            }

            $itemsCount = CustomDomain::where('shortLinkId', $ShortLink->id)->where('userId', $userId)->count();
            $items = CustomDomain::where('shortLinkId', $ShortLink->id)->where('userId', $userId)->get();

            return response()->json([
                'success' => true,
                'errors' => [],
                'message' => 'Request Completed Successfully!',
                'data' => [
                    'items' => CustomDomainResource::collection($items),
                    'itemsCount' => $itemsCount
                ],
                'status' => 200
            ]);
        } catch (\Throwable $th) {
            return ZHelpers::sendBackServerErrorResponse($th);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $workspaceId, $shortLinkId)
    {

        $userId = $request->user()->id;

        // getting workspace
        $workspace = WorkSpace::where('uniqueId', $workspaceId)->where('userId', $userId)->first();

        // getting Short-link in workspace
        $ShortLink = ShortLink::where('uniqueId', $shortLinkId)->where('userId', $userId)->where('workspaceId', $workspace->id)->first();

        if (!$ShortLink) {
            return ZHelpers::sendBackInvalidParamsResponse([
                "item" => ['No Short-link found!']
            ]);
        }

        $request->validate([
            'domain' => 'required|string',
            'sortOrderNo' => 'nullable|integer',
            'isActive' => 'nullable|boolean',
            'extraAttributes' => 'nullable|json',
        ]);

        try {
            $result = CustomDomain::create([
                'uniqueId' => uniqid(),
                'userId' => $userId,
                'shortLinkId' => $ShortLink->id,
                'domain' => $request->has('domain') ? $request->domain : null,
                'sortOrderNo' => $request->has('sortOrderNo') ? $request->sortOrderNo : null,
                'isActive' => $request->has('isActive') ? $request->isActive : null,
                'extraAttributes' => $request->has('extraAttributes') ? $request->extraAttributes : null,
            ]);

            if ($result) {
                return ZHelpers::sendBackRequestCompletedResponse([
                    'item' => new CustomDomainResource($result)
                ]);
            } else {
                return ZHelpers::sendBackRequestFailedResponse([]);
            }
        } catch (\Throwable $th) {
            return ZHelpers::sendBackServerErrorResponse($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $itemId
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $workspaceId, $shortLinkId, $itemId)
    {
        try {
            $userId = $request->user()->id;

            // getting workspace
            $workspace = WorkSpace::where('uniqueId', $workspaceId)->where('userId', $userId)->first();

            // getting Short-link in workspace
            $ShortLink = ShortLink::where('uniqueId', $shortLinkId)->where('userId', $userId)->where('workspaceId', $workspace->id)->first();

            if (!$ShortLink) {
                return ZHelpers::sendBackInvalidParamsResponse([
                    "item" => ['No Short-link found!']
                ]);
            }

            $item = CustomDomain::where('uniqueId', $itemId)->where('shortLinkId', $ShortLink->id)->where('userId', $userId)->first();

            if ($item) {
                return ZHelpers::sendBackRequestCompletedResponse([
                    'item' => new CustomDomainResource($item)
                ]);
            } else {
                return ZHelpers::sendBackRequestFailedResponse([
                    'item' => ['Not found!']
                ]);
            }
        } catch (\Throwable $th) {
            return ZHelpers::sendBackServerErrorResponse($th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $itemId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $workspaceId, $shortLinkId, $itemId)
    {

        $userId = $request->user()->id;

        // getting workspace
        $workspace = WorkSpace::where('uniqueId', $workspaceId)->where('userId', $userId)->first();

        // getting Short-link in workspace
        $ShortLink = ShortLink::where('uniqueId', $shortLinkId)->where('userId', $userId)->where('workspaceId', $workspace->id)->first();

        if (!$ShortLink) {
            return ZHelpers::sendBackInvalidParamsResponse([
                "item" => ['No Short-link found!']
            ]);
        }

        $request->validate([
            'domain' => 'required|string',
            'sortOrderNo' => 'nullable|integer',
            'isActive' => 'nullable|boolean',
            'extraAttributes' => 'nullable|json',
        ]);

        try {
            $item = CustomDomain::where('uniqueId', $itemId)->where('shortLinkId', $ShortLink->id)->where('userId', $userId)->first();

            if ($item) {
                $item->update([
                    'domain' => $request->has('domain') ? $request->domain : $item->domain,
                    'sortOrderNo' => $request->has('sortOrderNo') ? $request->sortOrderNo : null,
                    'isActive' => $request->has('isActive') ? $request->isActive : null,
                    'extraAttributes' => $request->has('extraAttributes') ? $request->extraAttributes : $request->extraAttributes,
                ]);

                $item = CustomDomain::where('uniqueId', $itemId)->where('userId', $userId)->first();
                return ZHelpers::sendBackRequestCompletedResponse([
                    'item' => new CustomDomainResource($item)
                ]);
            } else {
                return ZHelpers::sendBackRequestFailedResponse([
                    'item' => ['Not found!']
                ]);
            }
        } catch (\Throwable $th) {
            return ZHelpers::sendBackServerErrorResponse($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $itemId
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $workspaceId, $shortLinkId, $itemId)
    {
        $userId = $request->user()->id;

        // getting workspace
        $workspace = WorkSpace::where('uniqueId', $workspaceId)->where('userId', $userId)->first();

        // getting Short-link in workspace
        $ShortLink = ShortLink::where('uniqueId', $shortLinkId)->where('userId', $userId)->where('workspaceId', $workspace->id)->first();

        if (!$ShortLink) {
            return ZHelpers::sendBackInvalidParamsResponse([
                "item" => ['No Short-link found!']
            ]);
        }

        try {
            $item = CustomDomain::where('uniqueId', $itemId)->where('shortLinkId', $ShortLink->id)->where('userId', $userId)->first();

            if ($item) {
                $item->forceDelete();
                return ZHelpers::sendBackRequestCompletedResponse([]);
            } else {
                return ZHelpers::sendBackRequestFailedResponse([
                    'item' => ['Not found!']
                ]);
            }
        } catch (\Throwable $th) {
            return ZHelpers::sendBackServerErrorResponse($th);
        }
    }
}
