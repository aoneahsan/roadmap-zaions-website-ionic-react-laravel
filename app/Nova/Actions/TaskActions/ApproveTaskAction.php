<?php

namespace App\Nova\Actions\TaskActions;

use App\Zaions\Enums\RolesEnum;
use App\Zaions\Enums\VerificationStatusEnum;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ApproveTaskAction extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            if ($model->verificationStatus === VerificationStatusEnum::verified->name && $fields->isSuperAdmin) {
                $model->update([
                    'approvedBy' => $fields->userId,
                    'approverRemarks' => $fields->remarks,
                    'verificationStatus' => VerificationStatusEnum::approved->name
                ]);
            } else {
                return Action::danger('Invalid Request, you have to be a super admin to perform this action.');
            }
        }

        return Action::message('Task Approved successfully!');
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Remarks', 'remarks')->rules('required', 'string')->maxlength(1500)->enforceMaxlength()->help('Add some comment for record.'),
            Hidden::make('userId', 'userId')->default(function () use ($request) {
                return $request->user()->id;
            }),
            Hidden::make('isSuperAdmin', 'isSuperAdmin')->default(function () use ($request) {
                return $request->user()->hasRole(RolesEnum::superAdmin->name);
            })
        ];
    }
}
