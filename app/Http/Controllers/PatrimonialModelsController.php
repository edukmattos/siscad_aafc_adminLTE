<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PatrimonialModelRepository;

use SisCad\Services\PatrimonialService;

class PatrimonialModelsController extends Controller
{
    private $patrimonial_modelRepository;
    private $patrimonialService;

    public function __construct(PatrimonialModelRepository $patrimonial_modelRepository, PatrimonialService $patrimonialService)
    {
        $this->patrimonial_modelRepository = $patrimonial_modelRepository;
        $this->patrimonialService = $patrimonialService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('patrimonial_models-index');

        $patrimonial_models = $this->patrimonial_modelRepository->allPatrimonialModels();
        #dd($patrimonial_models);
        return view('patrimonial_models.index', compact('patrimonial_models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonial_models-create');

        return view('patrimonial_models.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialModelRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_model = $this->patrimonial_modelRepository->storePatrimonialModel($input);

        return redirect('patrimonial_models');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonial_models-show');

        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($id);
        $logs = $patrimonial_model->revisionHistory;

        return view('patrimonial_models.show', compact('patrimonial_model', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('patrimonial_models-edit');

        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($id);
        
        return view('patrimonial_models.edit', compact('patrimonial_model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialModelRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($id);
        $patrimonial_model->update($input);

        $this->patrimonialService->model_update($id);

        return redirect('patrimonial_models');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('patrimonial_models-destroy');

        if($this->memberRepository->findMembersByPatrimonialModelId($id)->count()>0)
        {
           return redirect('patrimonial_models')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_modelRepository->findPatrimonialModelById($id)->delete();

        return redirect('patrimonial_models');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_modelRepository->withTrashed()->findPatrimonialModelById($id)->restore();

        return redirect('patrimonial_models');
    }
}
