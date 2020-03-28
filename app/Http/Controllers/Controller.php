<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct( )
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
//               Alert::success('Success Title', session('Success Message'));
                toast('Employée ajouter avec success !','success');
            }
            if (session('delete')) {
                alert()->Warning('Are you sure?', 'You won\'t be able to revert this!')
                    ->showConfirmButton('Yes! Delete it', '#3085d6' )
                    ->showCancelButton('Cancel', '#aaa')->reverseButtons();
            }
            return $next($request);
        });
    }

}
