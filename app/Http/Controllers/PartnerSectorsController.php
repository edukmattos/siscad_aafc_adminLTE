<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PartnerSectorRepository;

class PartnerSectorsController extends Controller
{
    private $partner_sectorRepository;

    public function __construct(PartnerSectorRepository $partner_sectorRepository)
    {
        $this->partner_sectorRepository = $partner_sectorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('partner_sectors-index');

        $partner_sectors = $this->partner_sectorRepository->allPartnerSectors2();
        #dd($partner_sectors);
        return view('partner_sectors.index', compact('partner_sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('partner_sectors-create');

        return view('partner_sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PartnerSectorRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $partner_sector = $this->partner_sectorRepository->storePartnerSector($input);

        return redirect('partner_sectors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('partner_sectors-show');

        $partner_sector = $this->partner_sectorRepository->findPartnerSectorById($id);
        $logs = $partner_sector->revisionHistory;

        return view('partner_sectors.show', compact('partner_sector', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('partner_sectors-edit');

        $partner_sector = $this->partner_sectorRepository->findPartnerSectorById($id);
        
        return view('partner_sectors.edit', compact('partner_sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PartnerSectorRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $partner_sector = $this->partner_sectorRepository->findPartnerSectorById($id);
        $partner_sector->update($input);

        return redirect('partner_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('partner_sectors-create');

        if($this->memberRepository->findMembersByPartnerSectorId($id)->count()>0)
        {
           return redirect('partner_sectors')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->partner_sectorRepository->findPartnerSectorById($id)->delete();

        return redirect('partner_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->partner_sectorRepository->withTrashed()->findPartnerSectorById($id)->restore();

        return redirect('partner_sectors');
    }
}
