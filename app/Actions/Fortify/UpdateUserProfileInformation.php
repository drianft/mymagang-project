<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Auth;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'religion' => ['nullable', 'string', 'max:50'],
            'education' => ['nullable', 'string', 'max:100'],
            'cv_url' => ['nullable', 'file', 'mimes:pdf,docx', 'max:2048'],
            'industry' => ['nullable', 'string', 'max:100'],
            'company_description' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:100'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }

        if ($user->roles === 'applier') {
            $applier = $user->applier;

            if (! $applier) {
                $applier = $user->applier()->create();
            }

            if (isset($input['cv_url'])) {
                $cvPath = $input['cv_url']->store('cv_files', 'public');
                $applier->cv_url = $cvPath;
            }

            $applier->religion = $input['religion'] ?? $applier->religion;
            $applier->education = $input['education'] ?? $applier->education;

            $applier->save();
        }

        if ($user->roles === 'hr') {
            $hr = $user->hr;

            if (! $hr) {
                $hr = $user->hr()->create([
                    'position' => $input['position'] ?? 'Staff',
                    'company_id' => Auth::user()?->company->id ?? null,
                ]);
            } else {
                $hr->update([
                    'position' => $input['position'] ?? $hr->position,
                ]);
            }
        }


        if ($user->roles === 'company') {
            $company = $user->company;

            if (! $company) {
                $company = $user->company()->create([
                    'industry' => $input['industry'] ?? 'Unknown',
                    'company_description' => $input['company_description'] ?? '',
                    'joined_at' => now(),
                ]);
            } else {
                $company->update([
                    'industry' => $input['industry'] ?? $company->industry,
                    'company_description' => $input['company_description'] ?? $company->company_description,
                ]);
            }
        }

    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
