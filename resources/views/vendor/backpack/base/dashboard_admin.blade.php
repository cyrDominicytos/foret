@extends(backpack_view('blank'))

@section('content')
<div class="container-fluid animated fadeIn">
    <div id="ui-view">
        <div>

            <div class="animated fadeIn">
                <div class="row">
                 <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body pb-0">
                                <div class="btn-group float-right">
                                    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-settings"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-137px, 23px, 0px);">
                                        <a class="dropdown-item" href="/admin/user">Voir tout</a>
                                        <a class="dropdown-item" href="/admin/forestier">Voir les Forestiers</a>
                                        <a class="dropdown-item" href="#">Voir les autres intervenants</a>
                                        <a class="dropdown-item" href="#">Voir les autres exportateurs</a>
                                    </div>
                                </div>
                                <div class="text-value">9.823</div>
                                <div>Utilisateurs Total</div>
                            </div>
                            <div class="chart-wrapper mt-3" style="height:70px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <canvas class="chart chartjs-render-monitor" id="card-chart3" height="70" width="386" style="display: block; width: 386px; height: 70px;"></canvas>
                                <div id="card-chart3-tooltip" class="chartjs-tooltip top" style="opacity: 0; left: 102px; top: 102px;"><div class="tooltip-header"><div class="tooltip-header-item">March</div></div><div class="tooltip-body"><div class="tooltip-body-item"><span class="tooltip-body-item-color" style="background-color: rgba(230, 230, 230, 0.2);"></span><span class="tooltip-body-item-label">My First dataset</span><span class="tooltip-body-item-value">80</span></div></div></div></div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-info">
                            <div class="card-body pb-0">
                                <div class="btn-group float-right">
                                    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-settings"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-137px, 23px, 0px);">
                                        <a class="dropdown-item" href="/admin/forestier">Voir</a>
<!--                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>-->
                                    </div>
                                </div>
                                <div class="text-value">9.823</div>
                                <div>Forestiers</div>
                            </div>
                            <div class="chart-wrapper mt-3" style="height:70px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <canvas class="chart chartjs-render-monitor" id="card-chart3" height="70" width="386" style="display: block; width: 386px; height: 70px;"></canvas>
                                <div id="card-chart3-tooltip" class="chartjs-tooltip top" style="opacity: 0; left: 102px; top: 102px;"><div class="tooltip-header"><div class="tooltip-header-item">March</div></div><div class="tooltip-body"><div class="tooltip-body-item"><span class="tooltip-body-item-color" style="background-color: rgba(230, 230, 230, 0.2);"></span><span class="tooltip-body-item-label">My First dataset</span><span class="tooltip-body-item-value">80</span></div></div></div></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body pb-0">
                                <div class="btn-group float-right">
                                    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-settings"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-137px, 23px, 0px);">
                                        <a class="dropdown-item" href="#">Voir les agents des douanes</a>
                                        <a class="dropdown-item" href="#">Voir les agents de Bénin Controle</a>
                                        <a class="dropdown-item" href="#">Voir les agents de la CNCB</a>
                                    </div>
                                </div>
                                <div class="text-value">9.823</div>
                                <div>Autres intervanants</div>
                            </div>
                            <div class="chart-wrapper mt-3" style="height:70px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <canvas class="chart chartjs-render-monitor" id="card-chart3" height="70" width="386" style="display: block; width: 386px; height: 70px;"></canvas>
                                <div id="card-chart3-tooltip" class="chartjs-tooltip top" style="opacity: 0; left: 102px; top: 102px;"><div class="tooltip-header"><div class="tooltip-header-item">March</div></div><div class="tooltip-body"><div class="tooltip-body-item"><span class="tooltip-body-item-color" style="background-color: rgba(230, 230, 230, 0.2);"></span><span class="tooltip-body-item-label">My First dataset</span><span class="tooltip-body-item-value">80</span></div></div></div></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body pb-0">
                                <div class="btn-group float-right">
                                    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-settings"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-137px, 23px, 0px);">
                                        <a class="dropdown-item" href="#">Voir</a>
<!--                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>-->
                                    </div>
                                </div>
                                <div class="text-value">9.823</div>
                                <div>Exportateurs</div>
                            </div>
                            <div class="chart-wrapper mt-3 mx-3" style="height:70px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <canvas class="chart chartjs-render-monitor" id="card-chart4" height="70" width="354" style="display: block; width: 354px; height: 70px;"></canvas>
                                <div id="card-chart4-tooltip" class="chartjs-tooltip bottom top" style="opacity: 0; left: 25px; top: 103.4px;"><div class="tooltip-header"><div class="tooltip-header-item">January</div></div><div class="tooltip-body"><div class="tooltip-body-item"><span class="tooltip-body-item-color" style="background-color: rgba(230, 230, 230, 0.2);"></span><span class="tooltip-body-item-label">My First dataset</span><span class="tooltip-body-item-value">78</span></div></div></div></div>
                        </div>
                    </div>

                </div>

                

                

                

            </div>
        </div>
    </div>
</div>
@endsection

@section('after_styles')
    <!--<link rel="stylesheet" type="text/css" href="https://coreui.io/demo/2.0/vendors/@coreui/icons/css/coreui-icons.min.css">-->
    <!--<link rel="stylesheet" type="text/css" href="https://coreui.io/demo/2.0/vendors/flag-icon-css/css/flag-icon.min.css">-->
    <link rel="stylesheet" type="text/css" href="https://coreui.io/demo/2.0/vendors/simple-line-icons/css/simple-line-icons.css">

@endsection

@section('after_scripts')
    
    <script src="https://coreui.io/demo/2.0/vendors/chart.js/js/Chart.min.js"></script>    
    <script src="https://coreui.io/demo/2.0/vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js"></script>    
    <script src="https://coreui.io/demo/2.0/js/main.js"></script>    

@endsection
