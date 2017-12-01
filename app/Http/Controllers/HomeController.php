<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Repositories\PatrimonialRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    private $patrimonialRepository;

    public function __construct(
            PatrimonialRepository $patrimonialRepository
        )
    {
        $this->middleware('auth');

        $this->patrimonialRepository = $patrimonialRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last_patrimonials = $this->patrimonialRepository->lastPatrimonialsByInvoiceDate(6); 

        return view('home', compact('last_patrimonials'));
    }
}
