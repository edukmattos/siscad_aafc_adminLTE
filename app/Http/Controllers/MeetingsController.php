<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use JasperPHP\JasperPHP as JasperPHP;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\MeetingRepository;
use SisCad\Repositories\MeetingTypeRepository;
use SisCad\Repositories\CityRepository;

use Session;

class MeetingsController extends Controller
{
    private $meetingRepository;

    public function __construct(MeetingRepository $meetingRepository, MeetingTypeRepository $meeting_typeRepository, CityRepository $cityRepository)
    {
        $this->meetingRepository = $meetingRepository;
        $this->meeting_typeRepository = $meeting_typeRepository;
        $this->cityRepository = $cityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $this->authorize('meetings-index');

       $meetings = $this->meetingRepository->allMeetingsOrderByDateDesc();
       ##dd($meetings);

       return view('meetings.index', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    { 
        $this->authorize('meetings-create');

        $meeting_types = array(''=>'') + $this->meeting_typeRepository
            ->allMeetingTypes()
            ->pluck('description', 'id')
            ->all();

        $cities = array(''=>'') + $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        return view('meetings.create', compact('meeting_types', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\MeetingRequest $request)
    {
        $data = $request->all();

        if($data['date'])
        {
            $data['date'] = \DateTime::createFromFormat('d/m/Y', $data['date']);
            $data['date'] = $data['date']->format('Y-m-d');
        }
        else
        {
            $data['date'] = null;
        }

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['participants_estimated_qty'] = $numberFormatter_ptBR2en->parse(str_replace(['_','.'], '', $data['participants_estimated_qty']));

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['participants_confirmed_qty'] = $numberFormatter_ptBR2en->parse(str_replace(['_','.'], '', $data['participants_confirmed_qty']));

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['participants_refunds_amount'] = $numberFormatter_ptBR2en->parse(str_replace(['_','.'], '', $data['participants_refunds_amount']));

        $data['description'] = strtoupper($data['description']);

        $meeting = $this->meetingRepository->storeMeeting($data);

        $last_meeting = $this->meetingRepository->allMeetings()->last();

        return redirect()->route('meetings.show', ['id' => $last_meeting->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('meetings-show');

        $meeting = $this->meetingRepository->findMeetingById($id);
        $logs = $meeting->revisionHistory;
        
        return view('meetings.show', compact('meeting', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('meetings-edit');

        $meeting_types = array(''=>'') + $this->meeting_typeRepository
            ->allMeetingTypes()
            ->pluck('description', 'id')
            ->all();

        $cities = $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $meeting = $this->meetingRepository->findMeetingById($id);
        
        return view('meetings.edit', compact('meeting', 'meeting_types', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\MeetingRequest $request, $id)
    {
        $data = $request->all();

        if($data['date'])
        {
            $data['date'] = \DateTime::createFromFormat('d/m/Y', $data['date']);
            $data['date'] = $data['date']->format('Y-m-d');
        }
        else
        {
            $data['date'] = null;
        }
        
        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['participants_estimated_qty'] = $numberFormatter_ptBR2en->parse(str_replace(['_','.'], '', $data['participants_estimated_qty']));

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['participants_confirmed_qty'] = $numberFormatter_ptBR2en->parse(str_replace(['_','.'], '', $data['participants_confirmed_qty']));

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['participants_refunds_amount'] = $numberFormatter_ptBR2en->parse(str_replace(['_','.'], '', $data['participants_refunds_amount']));

        $data['description'] = strtoupper($data['description']);
                
        $meeting = $this->meetingRepository->findMeetingById($id);
        $meeting->update($data);

        return redirect('meetings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, MeetingRepository $meetingRepository)
    {
        $this->authorize('meetings-destroy');

        $this->meetingRepository->findMeetingById($id)->delete();

        Session::flash('flash_message_meeting_destroy', 'Registro EXCLUÍDO com sucesso !');

        return redirect()->route('meetings.show', ['id' => $id]);
    }

    public function restore($id)
    {
        $meeting = $this->meetingRepository->findMeetingTrashedById($id);
        $meeting->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('meetings.show', ['id' => $id]);
    }


    public function attendance_list_reports($id)
    {
        $meeting = $this->meetingRepository->findMeetingById($id);

        #dd($meeting->city->region_id);

        $srch_region_id             = $meeting->city->region_id;
        $srch_member_status_id      = 2;
        $srch_meeting_date          = $meeting->date->format('d/m/Y');
        #dd($srch_meeting_date);
        $srch_meeting_description   = $meeting->description;
        #dd($srch_meeting_description);
        
        $database = \Config::get('database.connections.mysql');

        $output = public_path() . '/reports/meetings/attendance ListByMeeting_'.date("Ymd_His");  
        $data = public_path() . '/reports/meetings/attendance ListByMeeting.jrxml'; 

        $conditions = array("jsp_region_id" => $srch_region_id, "jsp_member_status_id" => $srch_member_status_id, "jsp_meeting_date" => $srch_meeting_date, "jsp_meeting_description" => $srch_meeting_description);
        
        $ext = "pdf";
       
        $report = new JasperPHP;
        $report->process
        (
            $data, 
            $output, 
            array('pdf'),
            $conditions,
            $database  
        )->execute();

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=attendance ListByMeeting_'.date("Ymd_His").'.'.$ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output.'.'.$ext));
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext);
    }

}