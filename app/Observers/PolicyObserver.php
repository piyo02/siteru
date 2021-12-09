<?php

namespace App\Observers;

use App\Models\Policy;

class PolicyObserver
{
    public function deleted(Policy $policy)
    {
        try {
            unlink( \storage_path( 'app/' . $policy->file ) );
        } catch (\Exception $exception) {
            $message = 'Gagal Menghapus File "' . $policy->title;
        }
    }
}
