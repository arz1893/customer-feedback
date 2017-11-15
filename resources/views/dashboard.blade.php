<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3 style="font-size: 1.7em;">FAQ</h3>
                <p>Frequently asked <br>question</p>
            </div>
            <div class="icon">
                <i class="ion ion-clipboard"></i>
            </div>
            <a href="{{ route('faq.index') }}" class="small-box-footer">Click to view <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3 style="font-size: 1.7em;">Complaints</h3>

                <p>Product <br>complaints</p>
            </div>
            <div class="icon">
                <i class="ion ion-settings"></i>
            </div>
            <a href="{{ route('complaint.index') }}" class="small-box-footer">Click to view <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3 style="font-size: 1.7em;">Suggestions</h3>

                <p>Customer <br> suggestions</p>
            </div>
            <div class="icon">
                <i class="ion ion-ribbon-a"></i>
            </div>
            <a href="#" class="small-box-footer">Click to view <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3 style="font-size: 1.7em;">Questions</h3>

                <p>Customer <br> Questions</p>
            </div>
            <div class="icon">
                <i class="ion ion-help-circled"></i>
            </div>
            <a href="{{ route('question.index') }}" class="small-box-footer">Click to view <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <section class="content-header">
        <h1>Master Data</h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('master_product.index') }}">
                    <div class="info-box bg-blue">
                        <span class="info-box-icon"><i class="ion ion-ios-pricetags"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Products</span>
                            <span class="product-description">
                                {{ $productCounter }} item
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('master_service.index') }}">
                    <div class="info-box bg-teal">
                        <span class="info-box-icon"><i class="ion ion-ios-paper"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Services</span>
                            <span class="info-box-number"></span>
                            <span class="progress-description">
                                {{ $serviceCounter }} item
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    <section class="content-header">
        <h1>Users</h1>
    </section>
    <div class="content">
        <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Members</h3>

                    <div class="box-tools pull-right">
                        <span class="label label-danger">8 New Members</span>
                        {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                        {{--</button>--}}
                        {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>--}}
                        {{--</button>--}}
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        <li>
                            <img src="{{ asset('default-images/user1-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Alexander Pierce</a>
                            <span class="users-list-date">Today</span>
                        </li>
                        <li>
                            <img src="{{ asset('default-images/user8-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Norman</a>
                            <span class="users-list-date">Yesterday</span>
                        </li>
                        <li>
                            <img src="{{ asset('default-images/user7-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Jane</a>
                            <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                            <img src="{{ asset('default-images/user6-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">John</a>
                            <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                            <img src="{{ asset('default-images/user2-160x160.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Alexander</a>
                            <span class="users-list-date">13 Jan</span>
                        </li>
                        <li>
                            <img src="{{ asset('default-images/user5-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Sarah</a>
                            <span class="users-list-date">14 Jan</span>
                        </li>
                        <li>
                            <img src="{{ asset('default-images/user4-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Nora</a>
                            <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                            <img src="{{ asset('default-images/user3-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Nadia</a>
                            <span class="users-list-date">15 Jan</span>
                        </li>
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
            <!-- TO DO List -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>

                    <h3 class="box-title">To Do List</h3>

                    <div class="box-tools pull-right">
                        <ul class="pagination pagination-sm inline">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                    <ul class="todo-list">
                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="">
                            <!-- todo text -->
                            <span class="text">Design a nice theme</span>
                            <!-- Emphasis label -->
                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <input type="checkbox" value="">
                            <span class="text">Make the theme responsive</span>
                            <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <input type="checkbox" value="">
                            <span class="text">Let theme shine like a star</span>
                            <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <input type="checkbox" value="">
                            <span class="text">Let theme shine like a star</span>
                            <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <input type="checkbox" value="">
                            <span class="text">Check your messages and notifications</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <input type="checkbox" value="">
                            <span class="text">Let theme shine like a star</span>
                            <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                </div>
            </div>
            <!-- /.box -->
            </div>
        </div>
    </div>
</div>
<!-- /.row -->