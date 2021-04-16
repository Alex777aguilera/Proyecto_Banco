
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="principal.php">
                        <!-- Logo icon -->
                        <b class="logo-icon ps-1">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/LogoOB.png" style="width: 230px;" alt="homepage" class="light-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                           <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" />-->
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        
                        <!-- Search -->
                        <!-- =============================BUSCADOR================================= -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ================NOTIFICACIONES============================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-bell font-24"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- 
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i
                                                            class="ti-calendar"></i></span>
                                                    <div class="ms-2">
                                                        <h5 class="mb-0">Event today</h5>
                                                        <span class="mail-desc">Just a reminder that event</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-info btn-circle"><i
                                                            class="ti-settings"></i></span>
                                                    <div class="ms-2">
                                                        <h5 class="mb-0">Settings</h5>
                                                        <span class="mail-desc">You can customize this template</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-primary btn-circle"><i
                                                            class="ti-user"></i></span>
                                                    <div class="ms-2">
                                                        <h5 class="mb-0">Pavan kumar</h5>
                                                        <span class="mail-desc">Just see the my admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-danger btn-circle"><i
                                                            class="fa fa-link"></i></span>
                                                    <div class="ms-2">
                                                        <h5 class="mb-0">Luanch Admin</h5>
                                                        <span class="mail-desc">Just see the my new admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user me-1 ms-1"></i>
                                    Perfil</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet me-1 ms-1"></i>
                                    Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email me-1 ms-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="ti-settings me-1 ms-1"></i> Configuracion</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.html"><i
                                        class="fa fa-power-off me-1 ms-1"></i> Cerrar Secion</a>
                                <div class="dropdown-divider"></div>
                                
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="principal.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                    class="hide-menu">Opciones </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="formularios.php" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Formularios
                                        </span></a></li>
                                <li class="sidebar-item"><a href="index.html" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> login
                                        </span></a></li>

                                <li class="sidebar-item"><a href="tipo_transaccion.php" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Tipo Transaccion
                                        </span></a></li>

                                <li class="sidebar-item"><a href="catalogo.php" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Catalogos

                                 <li class="sidebar-item"><a href="plan_pago.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Plan Pago
                                        </span></a></li>
                                 <li class="sidebar-item"><a href="pago_cuota.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Pago Cuota

                                        </span></a></li>
                                <li class="sidebar-item"><a href="registrar_cliente.php" class="sidebar-link"><i
                                        class="mdi mdi-note-outline"></i><span class="hide-menu"> Registrar Cliente
                                </span></a></li> 
                                <li class="sidebar-item"><a href="vercliente.php" class="sidebar-link"><i
                                        class="mdi mdi-note-outline"></i><span class="hide-menu"> Ver Lista de Cliente  
                                </span></a></li>
                                <li class="sidebar-item"><a href="empleados_ingresar.php" class="sidebar-link"><i
                                                class="mdi mdi-note-plus"></i><span class="hide-menu"> Registrar Empleado
                                            </span></a></li>
                                    <li class="sidebar-item"><a href="empleados_listar.php" class="sidebar-link"><i
                                                class="mdi mdi-note-plus"></i><span class="hide-menu"> Listar Empleados
                                            </span></a></li>
                                    <li class="sidebar-item"><a href="empleados_modificar_consulta.php" class="sidebar-link"><i
                                                class="mdi mdi-note-plus"></i><span class="hide-menu"> Actualizar Empleado
                                            </span></a></li>     
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                    class="hide-menu">Empleados</span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="empleados_ingresar.php" class="sidebar-link"><i
                                                class="mdi mdi-note-plus"></i><span class="hide-menu"> Registrar Empleado
                                            </span></a></li>
                                    <li class="sidebar-item"><a href="empleados_listar.php" class="sidebar-link"><i
                                                class="mdi mdi-note-plus"></i><span class="hide-menu"> Listar Empleados
                                            </span></a></li>
                                    <li class="sidebar-item"><a href="empleados_modificar_consulta.php" class="sidebar-link"><i
                                                class="mdi mdi-note-plus"></i><span class="hide-menu"> Actualizar datos
                                            </span></a></li>
                                </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                    class="hide-menu">Transacciones </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="consultas.php" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Consultas 
                                        </span></a></li>
                                <li class="sidebar-item"><a href="depositos.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Depositos
                                        </span></a></li>
                                 <li class="sidebar-item"><a href="retiros.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Retiros
                                        </span></a></li>
                                 <li class="sidebar-item"><a href="plazofijo.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Plazo Fijo
                                        </span></a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        