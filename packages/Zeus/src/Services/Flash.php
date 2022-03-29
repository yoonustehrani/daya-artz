<?php

namespace Zeus\Services;

use Illuminate\Support\Facades\Log;

class Flash
{
    public $message = "";
    public $status = "";
    const STATUSES = [
        'info',
        'error',
        'warning',
        'info',
        'question',
        'success',
    ];

    public function __construct(string $message = "", $status = null)
    {
        $this->message = $message;
        if ($status) {
            $this->status = 'info';
        }
    }

    public function __call($name, $arguments)
    {
        if (in_array($name, self::STATUSES)) {
            if (isset($arguments[0])) {
                $this->message = $arguments[0];
            }
            $this->status = $name;
            $this->send();
        }
    }
    protected function send()
    {
        request()->session()->flash('zeus.flash', [
            'status' => $this->status,
            'message' => $this->message
        ]);
    }
}