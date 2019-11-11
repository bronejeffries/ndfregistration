              <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                  <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ route('load.index') }}" class="site_title"><img src="{{ asset('assets/images/kisaakateLogo.jpg') }}" style="width:50px;" class="img-circle" alt="..."> <span>NDF</span></a>
                  </div>

                  <div class="clearfix"></div>

                  <br />
                  <!-- sidebar menu -->
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                      <h3>General</h3>
                      <ul class="nav side-menu">
                        <li><a href="{{ route('dashboard') }}"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li><a><i class="fa fa-home"></i> Ebisaakaate <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="{{ route('ekns.create') }}">Start New</a></li>
                            <li><a href="{{ route('ekns.index') }}">List</a></li>
                          </ul>
                        </li>
                         <li><a><i class="fa fa-edit"></i> Active Years <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="{{ route('activeyears.create') }}">New Year</a></li>
                            <li><a href="{{ route('activeyears.index') }}">Previous Year</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <div class="menu_section">
                      <h3>Administration</h3>
                      <ul class="nav side-menu">
                        <li><a><i class="fa fa-bug"></i> System Users <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="{{ route('register') }}">{{ __('Register User') }}</a></li>
                            <li><a href="#">{{ __('All Users') }}</a></li>
                          </ul>
                        </li>
                        {{-- <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="page_403.html">403 Error</a></li>
                            <li><a href="page_404.html">404 Error</a></li>
                            <li><a href="page_500.html">500 Error</a></li>
                            <li><a href="plain_page.html">Plain Page</a></li>
                            <li><a href="login.html">Login Page</a></li>
                            <li><a href="pricing_tables.html">Pricing Tables</a></li>
                          </ul>
                        </li>
                        <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="#level1_1">Level One</a>
                              <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                  <li class="sub_menu"><a href="level2.html">Level Two</a>
                                  </li>
                                  <li><a href="#level2_1">Level Two</a>
                                  </li>
                                  <li><a href="#level2_2">Level Two</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a href="#level1_2">Level One</a>
                              </li>
                          </ul>
                        </li>
                        <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li> --}}
                      </ul>
                    </div>

                  </div>
                  <!-- /sidebar menu -->

                  <!-- /menu footer buttons -->
                  <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                  </div>
                  <!-- /menu footer buttons -->

                </div>
              </div>
