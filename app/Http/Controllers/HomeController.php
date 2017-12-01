<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Repositories\PatrimonialRepository;
use SisCad\Repositories\MemberRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    private $patrimonialRepository;
    private $memberRepository;

    public function __construct(
            PatrimonialRepository $patrimonialRepository,
            MemberRepository $memberRepository
        )
    {
        $this->middleware('auth');

        $this->patrimonialRepository = $patrimonialRepository;
        $this->memberRepository = $memberRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last_patrimonials = $this->patrimonialRepository->lastPatrimonialsByInvoiceDate(6);

        $plan1_last_members = $this->memberRepository->lastMembersByPlanStatusLimit(1, 2, 8);
        $plan2_last_members = $this->memberRepository->lastMembersByPlanStatusLimit(2, 2, 8);
        $plan3_last_members = $this->memberRepository->lastMembersByPlanStatusLimit(3, 2, 8);

        return view('home', compact('last_patrimonials', 'plan1_last_members', 'plan2_last_members', 'plan3_last_members'));
    }
}
