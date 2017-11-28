<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PatrimonialTypeRepository;
use SisCad\Repositories\PatrimonialRepository;
use SisCad\Repositories\AccountingAccountRepository;

class PatrimonialTypesController extends Controller
{
    private $patrimonial_typeRepository;
    private $patrimonialRepository;
    private $accounting_accountRepository;

    public function __construct(PatrimonialTypeRepository $patrimonial_typeRepository, PatrimonialRepository $patrimonialRepository, AccountingAccountRepository $accounting_accountRepository)
    {
        $this->patrimonial_typeRepository = $patrimonial_typeRepository;
        $this->patrimonialRepository = $patrimonialRepository;
        $this->accounting_accountRepository = $accounting_accountRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('patrimonial_types-index');

        $patrimonial_types = $this->patrimonial_typeRepository->allPatrimonialTypes();
        #dd($patrimonial_types);
        return view('patrimonial_types.index', compact('patrimonial_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonial_types-create');

        $asset_accounting_accounts = array(''=>'') + $this->accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->pluck('code_description', 'id')
            ->all();

        $depreciation_accounting_accounts = array(''=>'') + $this->accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->pluck('code_description', 'id')
            ->all();

        return view('patrimonial_types.create', compact('asset_accounting_accounts', 'depreciation_accounting_accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialTypeRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_type = $this->patrimonial_typeRepository->storePatrimonialType($input);

        return redirect('patrimonial_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonial_types-show');

        $patrimonial_type = $this->patrimonial_typeRepository->findPatrimonialTypeById($id);
        $logs = $patrimonial_type->revisionHistory;

        return view('patrimonial_types.show', compact('patrimonial_type', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('patrimonial_types-edit');

        $asset_accounting_accounts = array(''=>'') + $this->accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->pluck('code_description', 'id')
            ->all();

        $depreciation_accounting_accounts = array('1'=>'') + $this->accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->pluck('code_description', 'id')
            ->all();

        $patrimonial_type = $this->patrimonial_typeRepository->findPatrimonialTypeById($id);
        
        return view('patrimonial_types.edit', compact('patrimonial_type', 'asset_accounting_accounts', 'depreciation_accounting_accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialTypeRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_type = $this->patrimonial_typeRepository->findPatrimonialTypeById($id);
        $patrimonial_type->update($input);

        return redirect('patrimonial_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('patrimonial_types-destroy');

        if($this->patrimonialRepository->allPatrimonialsByPatrimonialTypeId($id)->count()>0)
        {
           return redirect('patrimonial_types')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) bem(ns) patrimonial(ais) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_typeRepository->findPatrimonialTypeById($id)->delete();

        return redirect('patrimonial_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_typeRepository->withTrashed()->findPatrimonialTypeById($id)->restore();

        return redirect('patrimonial_types');
    }
}
