<?php

namespace App\Traits;

trait ToastNotifications
{
    protected function sendToast($type, $message): void
    {
        session()->flash('toast', ['type' => $type, 'message' => $message]);
    }
}