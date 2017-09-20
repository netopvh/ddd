@extends('layout.backend.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('admin.home') }}
@stop

@section('content')
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-lg-8">

            <!-- Quick stats boxes -->
            <div class="row">
                <div class="col-lg-4">

                    <!-- Members online -->
                    <div class="panel bg-teal-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <span class="heading-text badge bg-teal-800">+53,6%</span>
                            </div>

                            <h3 class="no-margin">3,450</h3>
                            Members online
                            <div class="text-muted text-size-small">489 avg</div>
                        </div>

                        <div class="container-fluid">
                            <div id="members-online"></div>
                        </div>
                    </div>
                    <!-- /members online -->

                </div>

                <div class="col-lg-4">

                    <!-- Current server load -->
                    <div class="panel bg-pink-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                                            <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                                            <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                                            <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <h3 class="no-margin">49.4%</h3>
                            Current server load
                            <div class="text-muted text-size-small">34.6% avg</div>
                        </div>

                        <div id="server-load"></div>
                    </div>
                    <!-- /current server load -->

                </div>

                <div class="col-lg-4">

                    <!-- Today's revenue -->
                    <div class="panel bg-blue-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>

                            <h3 class="no-margin">$18,390</h3>
                            Today's revenue
                            <div class="text-muted text-size-small">$37,578 avg</div>
                        </div>

                        <div id="today-revenue"></div>
                    </div>
                    <!-- /today's revenue -->

                </div>
            </div>
            <!-- /quick stats boxes -->

        </div>

        <div class="col-lg-4">

            <!-- Daily financials -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Daily financials</h6>
                    <div class="heading-elements">
                        <form class="heading-form" action="#">
                            <div class="form-group">
                                <label class="checkbox checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                    <input type="checkbox" class="switcher" id="realtime" checked="checked">
                                    Realtime
                                </label>
                            </div>
                        </form>
                        <span class="badge bg-danger-400 heading-text">+86</span>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="content-group-xs" id="bullets"></div>

                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-pink text-pink btn-flat btn-rounded btn-icon btn-xs"><i class="icon-statistics"></i></a>
                            </div>

                            <div class="media-body">
                                Stats for July, 6: 1938 orders, $4220 revenue
                                <div class="media-annotation">2 hours ago</div>
                            </div>

                            <div class="media-right media-middle">
                                <ul class="icons-list">
                                    <li>
                                        <a href="#"><i class="icon-arrow-right13"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-teal-400 text-teal btn-flat btn-rounded btn-icon btn-xs"><i class="icon-redo2"></i></a>
                            </div>

                            <div class="media-body">
                                Invoice <a href="#">#4769</a> has been sent to <a href="#">Robert Smith</a>
                                <div class="media-annotation">Dec 12, 05:46</div>
                            </div>

                            <div class="media-right media-middle">
                                <ul class="icons-list">
                                    <li>
                                        <a href="#"><i class="icon-arrow-right13"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /daily financials -->

        </div>
    </div>
    <!-- /dashboard content -->
@stop