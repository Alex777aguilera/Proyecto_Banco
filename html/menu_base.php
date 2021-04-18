
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
                            <img src="../assets/images/LogoOB.png" style="width: 230px; height: 65px;" alt="homepage" class="light-logo" />

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
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <span class="text-white">Bienvenido <?php echo $_SESSION['nombreCompleto']; ?></span>
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ================NOTIFICACIONES============================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- 
                        <!-- Messages -->
                        <!-- ============================================================== -->
                       
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
                                
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="ti-settings me-1 ms-1"></i> Configuracion</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" id="cerrar_sesion" href="javascript:void(0)"><i
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
                                    class="hide-menu">Principal</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fas fa-cog"></i><span
                                    class="hide-menu">Opciones </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <?php
                                    if ($_SESSION['cargo'] == 'Gerente' or $_SESSION['cargo'] == 'Escritorio') {
                                        echo "<li class='sidebar-item'><a href='plan_pago.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Plan Pago </span></a></li>";
                                        echo "<li class='sidebar-item'><a href='prestamo.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Prestamo </span></a></li>";
                                    }
                                ?>
                            </ul>
                        </li>

                        <?php 
                            if ($_SESSION['cargo'] == 'Gerente') {
                                echo "<li class='sidebar-item'> <a class='sidebar-link has-arrow waves-effect waves-dark' href='javascript:void(0)' aria-expanded='false'><i class='fas fa-folder-open'></i><span class='hide-menu'>Datos Maestros</span></a>";
                                echo   "<ul aria-expanded='false' class='collapse  first-level'>";
                                echo   "<li class='sidebar-item'><a href='tipo_transaccion.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-men'> Tipo Transacción </span></a></li>";
                                echo   "<li class='sidebar-item'><a href='ver_transaccion.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-men'> Ver Tipo Transacción </span></a></li>";
                                echo   "<li class='sidebar-item'><a href='catalogo.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Tipo Cuenta </span></a></li>";
                                echo   "<li class='sidebar-item'><a href='ver_cuenta.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Ver Tipo Cuenta </span></a></li>";
                                echo   "<li class='sidebar-item'><a href='genero.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Registrar Género </span></a></li>";
                                echo   "<li class='sidebar-item'><a href='cargo.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Registrar Cargo </span></a></li>";
                                echo   "<li class='sidebar-item'><a href='ver_cargo.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Ver Cargo </span></a></li></ul>";
                                echo "</li>";  
                            }
                        ?>
                        <?php 
                            if ($_SESSION['cargo'] == 'Gerente') {
                                echo "<li class='sidebar-item'> <a class='sidebar-link has-arrow waves-effect waves-dark' href='javascript:void(0)' aria-expanded='false'><i class='fas fa-users'></i><span class='hide-menu'>Empleados</span></a>";
                                echo   "<ul aria-expanded='false' class='collapse  first-level'>";
                                echo   "<li class='sidebar-item'><a href='empleados_ingresar.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-men'> Registrar Empleado </span></a></li>";
                                echo   "<li class='sidebar-item'><a href='empleados_listar.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-men'> Listar Empleados </span></a></li>";
                                echo   "<li class='sidebar-item'><a href='lista_usuario.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Ver Usuario </span></a></li></ul>";
                                echo "</li>";  
                            }
                        ?>
                        <?php 
                            if ($_SESSION['cargo'] == 'Gerente') {
                                echo "<li class='sidebar-item'> <a class='sidebar-link has-arrow waves-effect waves-dark' href='javascript:void(0)' aria-expanded='false'><i class='fas fa-user'></i><span class='hide-menu'>Cliente</span></a>";
                                echo   "<ul aria-expanded='false' class='collapse  first-level'>";
                                echo   "<li class='sidebar-item'><a href='registrar_cliente.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-men'> Registrar Cliente </span></a></li>";
                                echo   "<li class='sidebar-item'><a href='vercliente.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Listar Cliente </span></a></li></ul>";
                                echo "</li>";  
                            }
                        ?>
                       <!-- <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fas fa-users"></i><span
                                    class="hide-menu">Usuario</span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="lista_usuario.php" class="sidebar-link"><i
                                                class="mdi mdi-note-plus"></i><span class="hide-menu"> Ver Usuario
                                            </span></a></li>
                                  
                                  
                                </ul> -->

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fas fa-retweet"></i><span
                                    class="hide-menu">Transacciones </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="consultas.php" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Consultas 
                                        </span></a></li>
                                
                                <?php
                                    if ($_SESSION['cargo'] == 'Gerente' or $_SESSION['cargo'] == 'Caja') {
                                        echo "<li class='sidebar-item'><a href='depositos.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Depositos </span></a></li>";
                                        echo "<li class='sidebar-item'><a href='retiros.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Retiros </span></a></li>";
                                        echo "<li class='sidebar-item'><a href='pago_cuota.php' class='sidebar-link'><i class='mdi mdi-note-plus'></i><span class='hide-menu'> Pago Cuota </span></a></li>";
                                    }
                                ?>
                                 <li class="sidebar-item"><a href="plazofijo.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Plazo Fijo
                                        </span></a></li>
                                 <li class="sidebar-item"><a href="proyeccion.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Proyección Plazo Fijo
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
        