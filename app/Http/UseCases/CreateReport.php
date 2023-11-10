<?php

namespace App\Http\UseCases;

use App\Jobs\SendSMSJob;
use App\Repositories\ReportRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateReport
{
    private ReportRepository $reportRepository;
    private UserRepository $userRepository;

    public function __construct(
        ReportRepository $reportRepository,
        UserRepository $userRepository
    )
    {
        $this->reportRepository = $reportRepository;
        $this->userRepository = $userRepository;
    }

    private function attachFiles(array &$inputs) {
        foreach ($inputs as $fieldName => $input) {
            if ($input instanceof UploadedFile) {
                $inputs[$fieldName] = str_replace('public', 'storage', $input->store('public/uploads'));
            }
        }
    }

    //Use request here on purpose
    public function handle(Request $request) {
        if ($request->input('email') !== null) {
            return;
        }

        $inputs = $request->all();
        $this->attachFiles($inputs);

        if (isset($inputs['photoInput'])) {
            $filename = 'public/uploads/' .sha1(mktime()) . '.png';
            @list($type, $fileData) = explode(';', $inputs['photoInput']);
            @list(, $fileData) = explode(',', $fileData);
            Storage::disk('local')->put(
                $filename
                , base64_decode($fileData)
            );

            $inputs['photoInput'] = str_replace('public', 'storage', $filename);
        }

        if (isset($inputs['audio'])) {
            if (!str_contains($inputs['audio'], 'storage')) {
                $filename = 'public/uploads/' .sha1(mktime()) . '.wav';
                Storage::disk('local')->put(
                    $filename
                    , base64_decode($inputs['audio'])
                );

                $inputs['audio'] = str_replace('public', 'storage', $filename);
            }
        }

        $this->reportRepository->create($inputs);

        //Use events later
        foreach ($this->userRepository->all() as $user) {
            SendSMSJob::dispatch('Alerte_BNAF', $user->phone, "Nouvelle alerte enregistrée sur la plateforme");
        }
    }
}