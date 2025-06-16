<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CustomProfileForm extends Component
{
    use WithFileUploads;
    public $religion;
    public $education;
    public $cv_url;
    public $industry;
    public $company_description;

    public function mount()
    {
        $user = Auth::user();

        // Prefill data sesuai role
        if ($user->roles === 'applier' && $user->applier) {
            $this->religion = $user->applier->religion;
            $this->education = $user->applier->education;
            $this->cv_url = $user->applier->cv_url;
        }

        if ($user->roles === 'company' && $user->company) {
            $this->industry = $user->company->industry;
            $this->company_description = $user->company->company_description;
        }
    }

    public function rules()
    {
        $rules = [];

        if (Auth::user()->roles === 'applier') {
            $rules = [
                'religion' => 'nullable|string|max:50',
                'education' => 'nullable|string|max:100',
                'cv_url' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            ];
        }

        if (Auth::user()->roles === 'company') {
            $rules = [
                'industry' => 'nullable|string|max:100',
                'company_description' => 'nullable|string|max:255',
            ];
        }

        return $rules;
    }

    public function updateProfileInformation()
    {
        $this->validate();

        $user = Auth::user();

        if ($user->roles === 'applier' && $user->applier) {
            $data = [
                'religion' => $this->religion,
                'education' => $this->education,
            ];

            // Cek apakah file diupload (dan bukan string path lama)
            if ($this->cv_url instanceof \Illuminate\Http\UploadedFile) {
                $path = $this->cv_url->store('cvs', 'public'); // simpan ke storage/app/public/cvs
                $data['cv_url'] = $path;

                $this->cv_url = $path;
            }

            $user->applier->update($data);
        }


        if ($user->roles === 'company' && $user->company) {
            $user->company->update([
                'industry' => $this->industry,
                'company_description' => $this->company_description,
            ]);
        }

        session()->flash('message', 'Profile updated successfully.');
    }

    public function deleteCV()
    {
        if ($this->cv_url) {
            Storage::disk('public')->delete($this->cv_url); // Hapus file dari storage
            $this->cv_url = null;

            // Update di database
            $user = Auth::user();
            if ($user->roles === 'applier' && $user->applier) {
                $user->applier->update(['cv_url' => null]);
            }

            // Reset file upload
            $this->reset('cv_url');

            session()->flash('message', 'CV berhasil dihapus.');
        }
    }


    public function render()
    {
        return view('livewire.profile.custom-profile-form');
    }
}
