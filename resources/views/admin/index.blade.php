@extends('admin.layouts.app')

@section('content')
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                   
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-file-text fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class='huge'>{{ $post_count }}</div>
                            <div>Posts</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('posts') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class='huge'>{{ $comment_count }}</div>
                            <div>Comments</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('comments') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                                <div class='huge'>{{ $user_count }}</div>
                            <div>Users</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('users') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-list fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                                <div class='huge'>{{ $category_count }}</div>
                            <div>Categories</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('categories') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Data', 'Count'],
                    <?php 

                        $element_text = ['All Posts', 'Comments', 'Users', 'Categories'];
                        $element_count = [$post_count, $comment_count, $user_count, $category_count];

                        for($i = 0; $i < 4; $i++) {
                            echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                        }

                    ?>
                ]);

                var options = {
                chart: {
                    title: '',
                    subtitle: '',
                }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>

        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
    </div>

@endsection