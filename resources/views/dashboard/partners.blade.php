@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
        <li class="breadcrumb-item">PAINEL DE CONTROLE</li>
        <li class="breadcrumb-item"><b>PARCEIROS</b></li>

        <div class="row pull-right">
            <a href="{!! route('partners.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
            <a href="{!! route('partners.search') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>  
        </div>
    </ol>

    <div class="row-fluid">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <a href="{!! route('dashboard.partners', ['partner_type_id' => 1]) !!}"><i class='fa fa-2x fa-eye'></i></a> 
            <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByType', 'partner_type_id' => 1]) !!}"><i class='fa fa-2x fa-tag'></i></a>
            <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByType', 'partner_type_id' => 1]) !!}"><i class='fa fa-2x fa-print'></i></a>
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        {{ $partner_type1->code }}                              
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        <i class="fa fa-users">{{ $partner_type1_allpartnersbytype->count() }}</i>
                        <i class="fa fa-envelope">{{ $partner_type1_allpartnersemailbytype->count() }}</i>
                    </h3>                       
                    <p>
                        Parceiros Ativos
                    </p>
                </div>
            </div>
            
            @foreach($partner_type1_regions as $region)
                @if($region->partners->count() >= 0)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <small>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1_<?php echo $region->id;?>" aria-expanded="false"><i class="indicator glyphicon glyphicon-chevron-down"></i></a>
                                        {{ $region->description }} 
                                    </small>
                                    <div class="pull-right">
                                        <small>
                                            @if($partner_type1_allpartnersbytype->count()>0)
                                                {{ $region->partners->count() }} ({{ number_format(100*($region->partners->count()/$partner_type1_allpartnersbytype->count()), 0) }}%)
                                            @else
                                                0
                                            @endif
                                        </small>
                                        <a href="{!! route('dashboard.partners', ['partner_type_id' => 1, 'region_id' => $region->id]) !!}"><i class='fa fa-eye'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 1, 'region_id' => $region->id]) !!}"><i class='fa fa-tag'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 1, 'region_id' => $region->id]) !!}"><i class='fa fa-print'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse1_<?php echo $region->id;?>" class="panel-collapse collapse">
                                @foreach($partner_type1_cities as $city)
                                    @if($city->region_id == $region->id)
                                        @if($city->partners->count()>0)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100*($city->partners->count()/$region->partners->count()) }}%">
                                                </div>
                                                <span class="progress-type">{{ $city->description }} / {{ $city->state->code }}</span>
                                                <span class="progress-completed">{{ $city->partners->count() }} ({{ number_format(100*($city->partners->count()/$region->partners->count()), 0) }}%) 
                                                    <a href="{!! route('dashboard.partners', ['partner_type_id' => 1, 'city_id' => $city->id]) !!}"><i class='fa fa-eye'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByCityType', 'partner_type_id' => 1, 'city_id' => $city->id]) !!}"><i class='fa fa-tag'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByCityType', 'partner_type_id' => 1, 'city_id' => $city->id]) !!}"><i class='fa fa-print'></i></a>
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <a href="{!! route('dashboard.partners', ['partner_type_id' => 2]) !!}"><i class='fa fa-2x fa-eye'></i></a> 
            <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByType', 'partner_type_id' => 2]) !!}"><i class='fa fa-2x fa-tag'></i></a>
            <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByType', 'partner_type_id' => 2]) !!}"><i class='fa fa-2x fa-print'></i></a>
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        {{ $partner_type2->code }}                              
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        <i class="fa fa-users">{{ $partner_type2_allpartnersbytype->count() }}</i>
                        <i class="fa fa-envelope">{{ $partner_type2_allpartnersemailbytype->count() }}</i>
                    </h3>                       
                    <p>
                        Parceiros Ativos
                    </p>
                </div>
            </div>
            
            @foreach($partner_type2_regions as $region)
                @if($region->partners->count() >= 0)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <small>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2_<?php echo $region->id;?>" aria-expanded="false"><i class="indicator glyphicon glyphicon-chevron-down"></i></a>
                                        {{ $region->description }} 
                                    </small>
                                    <div class="pull-right">
                                        <small>
                                            @if($partner_type2_allpartnersbytype->count()>0)
                                                {{ $region->partners->count() }} ({{ number_format(100*($region->partners->count()/$partner_type2_allpartnersbytype->count()), 0) }}%)
                                            @else
                                                0
                                            @endif
                                        </small>
                                        <a href="{!! route('dashboard.partners', ['partner_type_id' => 2, 'region_id' => $region->id]) !!}"><i class='fa fa-eye'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 2, 'region_id' => $region->id]) !!}"><i class='fa fa-tag'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 2, 'region_id' => $region->id]) !!}"><i class='fa fa-print'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse2_<?php echo $region->id;?>" class="panel-collapse collapse">
                                @foreach($partner_type2_cities as $city)
                                    @if($city->region_id == $region->id)
                                        @if($city->partners->count()>0)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100*($city->partners->count()/$region->partners->count()) }}%">
                                                </div>
                                                <span class="progress-type">{{ $city->description }} / {{ $city->state->code }}</span>
                                                <span class="progress-completed">{{ $city->partners->count() }} ({{ number_format(100*($city->partners->count()/$region->partners->count()), 0) }}%) 
                                                    <a href="{!! route('dashboard.partners', ['partner_type_id' => 2, 'city_id' => $city->id]) !!}"><i class='fa fa-eye'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByCityType', 'partner_type_id' => 2, 'city_id' => $city->id]) !!}"><i class='fa fa-tag'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByCityType', 'partner_type_id' => 2, 'city_id' => $city->id]) !!}"><i class='fa fa-print'></i></a>
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <a href="{!! route('dashboard.partners', ['partner_type_id' => 3]) !!}"><i class='fa fa-2x fa-eye'></i></a> 
            <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByType', 'partner_type_id' => 3]) !!}"><i class='fa fa-2x fa-tag'></i></a>
            <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByType', 'partner_type_id' => 3]) !!}"><i class='fa fa-2x fa-print'></i></a>
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        {{ $partner_type3->code }}                              
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        <i class="fa fa-users">{{ $partner_type3_allpartnersbytype->count() }}</i>
                        <i class="fa fa-envelope">{{ $partner_type3_allpartnersemailbytype->count() }}</i>
                    </h3>                       
                    <p>
                        Parceiros Ativos
                    </p>
                </div>
            </div>
            
            @foreach($partner_type3_regions as $region)
                @if($region->partners->count() >= 0)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <small>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3_<?php echo $region->id;?>" aria-expanded="false"><i class="indicator glyphicon glyphicon-chevron-down"></i></a>
                                        {{ $region->description }} 
                                    </small>
                                    <div class="pull-right">
                                        <small>
                                            @if($partner_type3_allpartnersbytype->count())
                                                {{ $region->partners->count() }} ({{ number_format(100*($region->partners->count()/$partner_type3_allpartnersbytype->count()), 0) }}%)
                                            @else
                                                0
                                            @endif
                                        </small>
                                        <a href="{!! route('dashboard.partners', ['partner_type_id' => 3, 'region_id' => $region->id]) !!}"><i class='fa fa-eye'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 3, 'region_id' => $region->id]) !!}"><i class='fa fa-tag'></i></a>  
                                        | 
                                        <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 3, 'region_id' => $region->id]) !!}"><i class='fa fa-print'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse3_<?php echo $region->id;?>" class="panel-collapse collapse">
                                @foreach($partner_type3_cities as $city)
                                    @if($city->region_id == $region->id)
                                        @if($city->partners->count()>0)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100*($city->partners->count()/$region->partners->count()) }}%">
                                                </div>
                                                <span class="progress-type">{{ $city->description }} / {{ $city->state->code }}</span>
                                                <span class="progress-completed">{{ $city->partners->count() }} ({{ number_format(100*($city->partners->count()/$region->partners->count()), 0) }}%) 
                                                    <a href="{!! route('dashboard.partners', ['partner_type_id' => 3, 'city_id' => $city->id]) !!}"><i class='fa fa-eye'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByCityType', 'partner_type_id' => 3, 'city_id' => $city->id]) !!}"><i class='fa fa-tag'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByCityType', 'partner_type_id' => 3, 'city_id' => $city->id]) !!}"><i class='fa fa-print'></i></a>
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <a href="{!! route('dashboard.partners', ['partner_type_id' => 4]) !!}"><i class='fa fa-2x fa-eye'></i></a> 
            <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByType', 'partner_type_id' => 4]) !!}"><i class='fa fa-2x fa-tag'></i></a>
            <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByType', 'partner_type_id' => 4]) !!}"><i class='fa fa-2x fa-print'></i></a>
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        {{ $partner_type4->code }}                              
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        <i class="fa fa-users">{{ $partner_type4_allpartnersbytype->count() }}</i>
                        <i class="fa fa-envelope">{{ $partner_type4_allpartnersemailbytype->count() }}</i>
                    </h3>                       
                    <p>
                        Parceiros Ativos
                    </p>
                </div>
            </div>
            
            @foreach($partner_type4_regions as $region)
                @if($region->partners->count() >= 0)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <small>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4_<?php echo $region->id;?>" aria-expanded="false"><i class="indicator glyphicon glyphicon-chevron-down"></i></a>
                                        {{ $region->description }} 
                                    </small>
                                    <div class="pull-right">
                                        <small>
                                            @if($partner_type4_allpartnersbytype->count()>0)
                                                {{ $region->partners->count() }} ({{ number_format(100*($region->partners->count()/$partner_type4_allpartnersbytype->count()), 0) }}%)
                                            @else
                                                0
                                            @endif
                                        </small>
                                        <a href="{!! route('dashboard.partners', ['partner_type_id' => 4, 'region_id' => $region->id]) !!}"><i class='fa fa-eye'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 4, 'region_id' => $region->id]) !!}"><i class='fa fa-tag'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 4, 'region_id' => $region->id]) !!}"><i class='fa fa-print'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse4_<?php echo $region->id;?>" class="panel-collapse collapse">
                                @foreach($partner_type4_cities as $city)
                                    @if($city->region_id == $region->id)
                                        @if($city->partners->count()>0)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100*($city->partners->count()/$region->partners->count()) }}%">
                                                </div>
                                                <span class="progress-type">{{ $city->description }} / {{ $city->state->code }}</span>
                                                <span class="progress-completed">{{ $city->partners->count() }} ({{ number_format(100*($city->partners->count()/$region->partners->count()), 0) }}%) 
                                                    <a href="{!! route('dashboard.partners', ['partner_type_id' => 4, 'city_id' => $city->id]) !!}"><i class='fa fa-eye'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByCityType', 'partner_type_id' => 4, 'city_id' => $city->id]) !!}"><i class='fa fa-tag'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByCityType', 'partner_type_id' => 4, 'city_id' => $city->id]) !!}"><i class='fa fa-print'></i></a>
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
   
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <a href="{!! route('dashboard.partners', ['partner_type_id' => 5]) !!}"><i class='fa fa-2x fa-eye'></i></a> 
            <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByType', 'partner_type_id' => 5]) !!}"><i class='fa fa-2x fa-tag'></i></a>
            <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByType', 'partner_type_id' => 5]) !!}"><i class='fa fa-2x fa-print'></i></a>
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        {{ $partner_type5->code }}                              
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        <i class="fa fa-users">{{ $partner_type5_allpartnersbytype->count() }}</i>
                        <i class="fa fa-envelope">{{ $partner_type5_allpartnersemailbytype->count() }}</i>
                    </h3>                       
                    <p>
                        Parceiros Ativos
                    </p>
                </div>
            </div>
            
            @foreach($partner_type5_regions as $region)
                @if($region->partners->count() >= 0)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <small>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5_<?php echo $region->id;?>" aria-expanded="false"><i class="indicator glyphicon glyphicon-chevron-down"></i></a>
                                        {{ $region->description }} 
                                    </small>
                                    <div class="pull-right">
                                        <small>
                                            @if($partner_type5_allpartnersbytype->count()>0)
                                                {{ $region->partners->count() }} ({{ number_format(100*($region->partners->count()/$partner_type5_allpartnersbytype->count()), 0) }}%)
                                            @else
                                                0
                                            @endif
                                        </small>
                                        <a href="{!! route('dashboard.partners', ['partner_type_id' => 5, 'region_id' => $region->id]) !!}"><i class='fa fa-eye'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 5, 'region_id' => $region->id]) !!}"><i class='fa fa-tag'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 5, 'region_id' => $region->id]) !!}"><i class='fa fa-print'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse5_<?php echo $region->id;?>" class="panel-collapse collapse">
                                @foreach($partner_type5_cities as $city)
                                    @if($city->region_id == $region->id)
                                        @if($city->partners->count()>0)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100*($city->partners->count()/$region->partners->count()) }}%">
                                                </div>
                                                <span class="progress-type">{{ $city->description }} / {{ $city->state->code }}</span>
                                                <span class="progress-completed">{{ $city->partners->count() }} ({{ number_format(100*($city->partners->count()/$region->partners->count()), 0) }}%) 
                                                    <a href="{!! route('dashboard.partners', ['partner_type_id' => 5, 'city_id' => $city->id]) !!}"><i class='fa fa-eye'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByCityType', 'partner_type_id' => 5, 'city_id' => $city->id]) !!}"><i class='fa fa-tag'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByCityType', 'partner_type_id' => 5, 'city_id' => $city->id]) !!}"><i class='fa fa-print'></i></a>
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <a href="{!! route('dashboard.partners', ['partner_type_id' => 6]) !!}"><i class='fa fa-2x fa-eye'></i></a> 
            <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByType', 'partner_type_id' => 6]) !!}"><i class='fa fa-2x fa-tag'></i></a>
            <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByType', 'partner_type_id' => 6]) !!}"><i class='fa fa-2x fa-print'></i></a>
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        {{ $partner_type6->code }}                              
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        <i class="fa fa-users">{{ $partner_type6_allpartnersbytype->count() }}</i>
                        <i class="fa fa-envelope">{{ $partner_type6_allpartnersemailbytype->count() }}</i>
                    </h3>                       
                    <p>
                        Parceiros Ativos
                    </p>
                </div>
            </div>
            
            @foreach($partner_type6_regions as $region)
                @if($region->partners->count() >= 0)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <small>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6_<?php echo $region->id;?>" aria-expanded="false"><i class="indicator glyphicon glyphicon-chevron-down"></i></a>
                                        {{ $region->description }} 
                                    </small>
                                    <div class="pull-right">
                                        <small>
                                            @if($partner_type6_allpartnersbytype->count()>0)
                                                {{ $region->partners->count() }} ({{ number_format(100*($region->partners->count()/$partner_type6_allpartnersbytype->count()), 0) }}%)
                                            @else
                                                0
                                            @endif
                                        </small>
                                        <a href="{!! route('dashboard.partners', ['partner_type_id' => 6, 'region_id' => $region->id]) !!}"><i class='fa fa-eye'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 6, 'region_id' => $region->id]) !!}"><i class='fa fa-tag'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 6, 'region_id' => $region->id]) !!}"><i class='fa fa-print'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse6_<?php echo $region->id;?>" class="panel-collapse collapse">
                                @foreach($partner_type6_cities as $city)
                                    @if($city->region_id == $region->id)
                                        @if($city->partners->count()>0)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100*($city->partners->count()/$region->partners->count()) }}%">
                                                </div>
                                                <span class="progress-type">{{ $city->description }} / {{ $city->state->code }}</span>
                                                <span class="progress-completed">{{ $city->partners->count() }} ({{ number_format(100*($city->partners->count()/$region->partners->count()), 0) }}%) 
                                                    <a href="{!! route('dashboard.partners', ['partner_type_id' => 6, 'city_id' => $city->id]) !!}"><i class='fa fa-eye'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByCityType', 'partner_type_id' => 6, 'city_id' => $city->id]) !!}"><i class='fa fa-tag'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByCityType', 'partner_type_id' => 6, 'city_id' => $city->id]) !!}"><i class='fa fa-print'></i></a>
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <a href="{!! route('dashboard.partners', ['partner_type_id' => 7]) !!}"><i class='fa fa-2x fa-eye'></i></a> 
            <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByType', 'partner_type_id' => 7]) !!}"><i class='fa fa-2x fa-tag'></i></a>
            <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByType', 'partner_type_id' => 7]) !!}"><i class='fa fa-2x fa-print'></i></a>
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        {{ $partner_type7->code }}                              
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        <i class="fa fa-users">{{ $partner_type7_allpartnersbytype->count() }}</i>
                        <i class="fa fa-envelope">{{ $partner_type7_allpartnersemailbytype->count() }}</i>
                    </h3>                       
                    <p>
                        Parceiros Ativos
                    </p>
                </div>
            </div>
            
            @foreach($partner_type7_regions as $region)
                @if($region->partners->count() >= 0)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <small>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse7_<?php echo $region->id;?>" aria-expanded="false"><i class="indicator glyphicon glyphicon-chevron-down"></i></a>
                                        {{ $region->description }} 
                                    </small>
                                    <div class="pull-right">
                                        <small>
                                            @if($partner_type7_allpartnersbytype->count()>0)
                                                {{ $region->partners->count() }} ({{ number_format(100*($region->partners->count()/$partner_type7_allpartnersbytype->count()), 0) }}%)
                                            @else
                                                0
                                            @endif
                                        </small>
                                        <a href="{!! route('dashboard.partners', ['partner_type_id' => 7, 'region_id' => $region->id]) !!}"><i class='fa fa-eye'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 7, 'region_id' => $region->id]) !!}"><i class='fa fa-tag'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByRegionType', 'partner_type_id' => 7, 'region_id' => $region->id]) !!}"><i class='fa fa-print'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse7_<?php echo $region->id;?>" class="panel-collapse collapse">
                                @foreach($partner_type7_cities as $city)
                                    @if($city->region_id == $region->id)
                                        @if($city->partners->count()>0)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100*($city->partners->count()/$region->partners->count()) }}%">
                                                </div>
                                                <span class="progress-type">{{ $city->description }} / {{ $city->state->code }}</span>
                                                <span class="progress-completed">{{ $city->partners->count() }} ({{ number_format(100*($city->partners->count()/$region->partners->count()), 0) }}%) 
                                                    <a href="{!! route('dashboard.partners', ['partner_type_id' => 7, 'city_id' => $city->id]) !!}"><i class='fa fa-eye'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByCityType', 'partner_type_id' => 7, 'city_id' => $city->id]) !!}"><i class='fa fa-tag'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByCityType', 'partner_type_id' => 7, 'city_id' => $city->id]) !!}"><i class='fa fa-print'></i></a>
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <a href="{!! route('dashboard.partners') !!}"><i class='fa fa-2x fa-eye'></i></a> 
            <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartners']) !!}"><i class='fa fa-2x fa-tag'></i></a>
            <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartners']) !!}"><i class='fa fa-2x fa-print'></i></a>
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        TODOS                              
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        <i class="fa fa-users">{{ $partner_type1_allpartnersbytype->count() + $partner_type2_allpartnersbytype->count() + $partner_type3_allpartnersbytype->count() + $partner_type4_allpartnersbytype->count() + $partner_type5_allpartnersbytype->count() + $partner_type6_allpartnersbytype->count()+ $partner_type7_allpartnersbytype->count()}}</i>
                        <i class="fa fa-envelope">{{ $partner_type1_allpartnersemailbytype->count() + $partner_type2_allpartnersemailbytype->count() + $partner_type3_allpartnersemailbytype->count() + $partner_type4_allpartnersemailbytype->count() + $partner_type5_allpartnersemailbytype->count() + $partner_type6_allpartnersemailbytype->count() + $partner_type7_allpartnersemailbytype->count() }}</i>
                    </h3>                       
                    <p>
                        Parceiros Ativos
                    </p>
                </div>
            </div>
            
            @foreach($partner_type_regions as $region)
                @if($region->partners->count() >= 0)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <small>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $region->id;?>" aria-expanded="false"><i class="indicator glyphicon glyphicon-chevron-down"></i></a>
                                        {{ $region->description }} 
                                    </small>
                                    <div class="pull-right">
                                        <small>
                                            @if(($partner_type1_allpartnersbytype->count() + $partner_type2_allpartnersbytype->count() + $partner_type3_allpartnersbytype->count() + $partner_type4_allpartnersbytype->count() + $partner_type5_allpartnersbytype->count() + $partner_type6_allpartnersbytype->count() + $partner_type7_allpartnersbytype->count())>0)
                                                {{ $region->partners->count() }} ({{ number_format(100*($region->partners->count()/($partner_type1_allpartnersbytype->count() + $partner_type2_allpartnersbytype->count() + $partner_type3_allpartnersbytype->count() + $partner_type4_allpartnersbytype->count() + $partner_type5_allpartnersbytype->count() + $partner_type6_allpartnersbytype->count() + $partner_type7_allpartnersbytype->count())), 0) }}%)
                                            @else
                                                0
                                            @endif
                                        </small>
                                        <a href="{!! route('dashboard.partners', ['region_id' => $region->id]) !!}"><i class='fa fa-eye'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByRegion', 'region_id' => $region->id]) !!}"><i class='fa fa-tag'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByRegion', 'region_id' => $region->id]) !!}"><i class='fa fa-print'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse_<?php echo $region->id;?>" class="panel-collapse collapse">
                                @foreach($partner_type_cities as $city)
                                    @if($city->region_id == $region->id)
                                        @if($city->partners->count()>0)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100*($city->partners->count()/$region->partners->count()) }}%">
                                                </div>
                                                <span class="progress-type">{{ $city->description }} / {{ $city->state->code }}</span>
                                                <span class="progress-completed">{{ $city->partners->count() }} ({{ number_format(100*($city->partners->count()/$region->partners->count()), 0) }}%) 
                                                    <a href="{!! route('dashboard.partners', ['city_id' => $city->id]) !!}"><i class='fa fa-eye'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_labels', ['model' => 'allPartnersByCity', 'city_id' => $city->id]) !!}"><i class='fa fa-tag'></i></a> 
                                                    | 
                                                    <a href="{!! route('dashboard.partners_reports', ['model' => 'allPartnersByCity', 'city_id' => $city->id]) !!}"><i class='fa fa-print'></i></a>
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('js_scripts')
    <script type="text/javascript">
        function toggleChevron(e) 
            {
                $(e.target)
                .prev('.panel-heading')
                .find("i.indicator")
                .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
            }
        $('#accordion').on('hidden.bs.collapse', toggleChevron);
        $('#accordion').on('shown.bs.collapse', toggleChevron);
    </script>
@endsection