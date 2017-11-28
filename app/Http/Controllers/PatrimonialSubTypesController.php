<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PatrimonialSubTypeRepository;

use SisCad\Services\PatrimonialService;

class PatrimonialSubTypesController extends Controller
{
    private $patrimonial_sub_typeRepository;
    private $patrimonialService;

    public function __construct(PatrimonialSubTypeRepository $patrimonial_sub_typeRepository, PatrimonialService $patrimonialService)
    {
        $this->patrimonial_sub_typeRepository = $patrimonial_sub_typeRepository;
        $this->patrimonialService = $patrimonialService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('patrimonial_sub_types-index');

        $patrimonial_sub_types = $this->patrimonial_sub_typeRepository->allPatrimonialSubTypes();
        #dd($patrimonial_sub_types);
        return view('patrimonial_sub_types.index', compact('patrimonial_sub_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonial_sub_types-create');

        return view('patrimonial_sub_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialSubTypeRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_sub_type = $this->patrimonial_sub_typeRepository->storePatrimonialSubType($input);

        return redirect('patrimonial_sub_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonial_sub_types-show');

        $patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findPatrimonialSubTypeById($id);
        $logs = $patrimonial_sub_type->revisionHistory;

        return view('patrimonial_sub_types.show', compact('patrimonial_sub_type', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('patrimonial_sub_types-edit');

        $patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findPatrimonialSubTypeById($id);
        
        return view('patrimonial_sub_types.edit', compact('patrimonial_sub_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialSubTypeRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findPatrimonialSubTypeById($id);
        $patrimonial_sub_type->update($input);

        $this->patrimonialService->sub_type_update($id);

        return redirect('patrimonial_sub_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('patrimonial_sub_types-destroy');

        if($this->memberRepository->findMembersByPatrimonialSubTypeId($id)->count()>0)
        {
           return redirect('patrimonial_sub_types')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_sub_typeRepository->findPatrimonialSubTypeById($id)->delete();

        return redirect('patrimonial_sub_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_sub_typeRepository->withTrashed()->findPatrimonialSubTypeById($id)->restore();

        return redirect('patrimonial_sub_types');
    }
}
