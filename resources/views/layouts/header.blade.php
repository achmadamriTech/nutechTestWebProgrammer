<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
     <div class="container">
         <a href="../../index3.html" class="navbar-brand">
             <span class="brand-text"><strong>Nutech <span style="color:#ff4b00">Integration</span></strong></span>
         </a>

         <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse order-3" id="navbarCollapse">
             <!-- Left navbar links -->
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a {{ $module == "Home" ? 'class= active' : ''}} href="{{ route('home')}}" class="nav-link">Home</a>
                 </li>
                 <li class="nav-item">
                     <a {{ $module == "Barang" ? 'class= active' : ''}} href="{{route('barang')}}" class="nav-link">Data Barang</a>
                 </li>
             </ul>

             <!-- Right navbar links -->
             <!-- <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                 <li class="nav-item">
                     <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                         <i class="fas fa-sign-out-alt"><span> Log Out</span></i>
                     </a>
                 </li>
             </ul> -->
         </div>
 </nav>