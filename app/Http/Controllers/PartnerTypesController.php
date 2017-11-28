<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PartnerTypeRepository;

use SisCad\Repositories\PartnerRepository;

class PartnerTypesController extends Controller
{
    private $partner_typeRepository;

    public function __construct(PartnerTypeRepository $partner_typeRepository, PartnerRepository $partnerRepository)
    {
        $this->partner_typeRepository = $partner_typeRepository;
        $this->partnerRepository = $partnerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $partner_types = $this->partner_typeRepository->allPartnerTypes();
        #dd($partner_types);
        return view('partner_types.index', compact('partner_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('partner_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PartnerTypeRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $partner_type = $this->partner_typeRepository->storePartnerType($input);

        return redirect('partner_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $partner_type = $this->partner_typeRepository->findPartnerTypeById($id);
        $logs = $partner_type->revisionHistory;

        return view('partner_types.show', compact('partner_type', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $partner_type = $this->partner_typeRepository->findPartnerTypeById($id);
        
        return view('partner_types.edit', compact('partner_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PartnerTypeRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $partner_type = $this->partner_typeRepository->findPartnerTypeById($id);
        $partner_type->update($input);

        return redirect('partner_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->partnerRepository->findPartnersByTypeId($id)->count()>0)
        {
           #return view('errors.destroy_denied');
           return redirect('partner_types')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Parceiro(s) vinculado(s) a este registro !']); 
        }

        $this->partner_typeRepository->findPartnerTypeById($id)->delete();

        return redirect('partner_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->partner_typeRepository->withTrashed()->findPartnerTypeById($id)->restore();

        return redirect('partner_types');
    }
}
