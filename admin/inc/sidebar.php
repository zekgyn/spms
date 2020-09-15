<!-- Top Bar Start-->

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
<a class="navbar-brand col-md-3 col-lg-2 mr-0 px-4" href="dashboard.php">SPMS ADMIN Dashboard</a>
<ul class="navbar-nav px-3">
 <li class="nav-item text-nowrap">
   <form class="form-inline my-2 my-lg-0" action="inc/logout.php" method="post">
     <input class="btn btn-outline-primary my-2"  name="logout" type="submit" value="Log Out"></input>
   </form>
 </li>
</ul>

</nav>
    <!-- Top Bar End-->


<!-- Side Bar Start-->
<div class="container-fluid">
  <div class="row">

    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
        <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column account-tab-stap">





          <li>
            <a class="btn btn-inline-primary btn-block color active" href="dashboard.php">
              <span data-feather="home"></span>
              Employees
              <span data-feather="shopping-cart"></span>

            </a>
          </li>
          <li>
            <a class="btn btn-inline-primary btn-block color" href="empadd.php">
              <span data-feather="users"></span>
              Add New Employees
            </a>
          </li>
          <li>
            <a class="btn btn-inline-primary btn-block color" href="empeval.php">
              <span data-feather="users"></span>
              Employee evaluate
            </a>
          </li>
          <li>
            <a class="btn btn-inline-primary btn-block color" href="empreport.php">
              <span data-feather="layers"></span>
              Employee Report
            </a>
          </li>

        </ul>

      </div>
    </nav>

    </div>
      </div>

      <!-- Side Bar End-->
