<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PatrimonialBrandRepository;

use SisCad\Services\PatrimonialService;

class PatrimonialBrandsController extends Controller
{
    private $patrimonial_brandRepository;
    private $patrimonialService;

    public function __construct(PatrimonialBrandRepository $patrimonial_brandRepository, PatrimonialService $patrimonialService)
    {
        $this->patrimonial_brandRepository = $patrimonial_brandRepository;
        $this->patrimonialService = $patrimonialService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('patrimonial_brands-index');

        $patrimonial_brands = $this->patrimonial_brandRepository->allPatrimonialBrands();
        #dd($patrimonial_brands);
        return view('patrimonial_brands.index', compact('patrimonial_brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonial_brands-create');

        return view('patrimonial_brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialBrandRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_brand = $this->patrimonial_brandRepository->storePatrimonialBrand($input);

        return redirect('patrimonial_brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonial_brands-show');

        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($id);
        $logs = $patrimonial_brand->revisionHistory;

        return view('patrimonial_brands.show', compact('patrimonial_brand', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('patrimonial_brands-edit');

        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($id);
        
        return view('patrimonial_brands.edit', compact('patrimonial_brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialBrandRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($id);
        $patrimonial_brand->update($input);

        $this->patrimonialService->brand_update($id);

        return redirect('patrimonial_brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('patrimonial_brands-destroy');

        if($this->memberRepository->findMembersByPatrimonialBrandId($id)->count()>0)
        {
           return redirect('patrimonial_brands')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_brandRepository->findPatrimonialBrandById($id)->delete();

        return redirect('patrimonial_brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_brandRepository->withTrashed()->findPatrimonialBrandById($id)->restore();

        return redirect('patrimonial_brands');
    }
}
