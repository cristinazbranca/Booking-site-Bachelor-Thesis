<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="admindash.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Panou de administrare</span>
            </a>
          </li>      
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Utilizatori</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="./users.php">Conturi</a></li>
              </ul>
            </div>
          </li>

           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title"> Modificări Camere</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./create-rooms.php">Adaugă camere</a></li>
              </ul>
            </div>
          </li>
          <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./rooms.php">Camere</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Rezervări</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./booking.php">Rezervări în așteptare</a></li>
                <li class="nav-item"> <a class="nav-link" href="./acceptedreserv.php">Rezervări confirmate</a></li>
                <li class="nav-item"> <a class="nav-link" href="./checkout.php">Plecare</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                                <i class="icon-ban menu-icon"></i>
                                 <span class="menu-title">Anunțuri</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="error">
                            <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="viewannounce.php"> Modificări </a></li>
                      </ul>
                    </div>
                  </li>




          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Profil Administrator</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./profile.php">Modificare</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>