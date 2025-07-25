<?php

namespace App\Nova\ZLink\Analytics;

use App\Nova\Default\WorkSpace;
use App\Nova\Resource;
use App\Zaions\Helpers\ZHelpers;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;


class UtmTag extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ZLink\Analytics\UtmTag>
     */
    public static $model = \App\Models\ZLink\Analytics\UtmTag::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            // 
            Gravatar::make()->maxWidth(50),

            // Hidden fields
            // Hidden::make('sortOrderNo', 'sortOrderNo')->default(function () {
            //     $lastItem = LinkInBio::latest()->first();
            //     return $lastItem ? $lastItem->sortOrderNo + 1 : 1;
            // }),
            Hidden::make('userId', 'userId')
                ->default(function (NovaRequest $request) {
                    return $request->user()->getKey();
                }),

            // Normal fields
            Text::make('Unique Id', 'uniqueId')
                ->onlyOnDetail()
                ->default(function () {
                    return uniqid();
                }),

            Text::make('Template name', 'templateName')->sortable()
                ->rules('required', 'max:255')
                ->showWhenPeeking(),

            Text::make('Utm Campaign', 'utmCampaign')->sortable()
                ->rules('required', 'max:255')
                ->showWhenPeeking(),

            Text::make('Utm Medium', 'utmMedium')->sortable()
                ->rules('required', 'max:255')
                ->showWhenPeeking(),

            Text::make('Utm Source', 'utmSource')->sortable()
                ->rules('max:255')
                ->showWhenPeeking(),

            Text::make('Utm Term', 'utmTerm')->sortable()
                ->rules('max:255')
                ->showWhenPeeking(),

            Text::make('Utm Content', 'utmContent')->sortable()
                ->rules('max:255')
                ->showWhenPeeking(),

            Boolean::make('isActive', 'isActive')->default(true)
                ->show(function (NovaRequest $request) {
                    return ZHelpers::isNRUserSuperAdmin($request);
                }),

            KeyValue::make('Extra attributes', 'extraAttributes')
                ->rules('nullable'),

            MorphToMany::make('Workspace', 'workspaces', WorkSpace::class)->fields(function ($request, $relatedModel) {

                return [
                    Hidden::make('userId', 'userId')
                        ->default(function (NovaRequest $request) {
                            return $request->user()->getKey();
                        }),
                ];
            }),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
