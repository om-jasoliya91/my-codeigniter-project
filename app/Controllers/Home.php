<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return "Welcome";
    }

    public function register()
    {
        return view('register'); // load view
    }

    public function validates()
    {
        // Define rules
        $rules = [
            'name'     => 'required|min_length[2]',
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        // Run validation
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ]);
        }

        // Validation success
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Form validated successfully!'
        ]);
    }
}
