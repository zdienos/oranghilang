<<<<<<< HEAD
<style type="text/css">
        @font-face {
          font-family: coolvetica;
          src: url(<?=base_url('assets/coolvetica.ttf')?>);
        }
        .ti-search:before {
          color: black;
            margin-left: 20px;
            top: 20px;
            position: absolute;
            content: "\E610";
        } 
        </style>
<div class="sidebar">
   <div class="sidebar-inner">
      <div class="sidebar-logo">
         <div class="peers ai-c fxw-nw">
            <div class="peer peer-greed">
               <a class="sidebar-link td-n" href="<?=base_url()?>">
                  <div class="peers ai-c fxw-nw">
                     <div class="peer">
                        <div class="logo"><i class="ti-search" style="font-size: 2em;"></i></div>
                     </div>
                     <div class="peer peer-greed">
                        <h5 class="lh-1 mB-0 logo-text" style="font-family: coolvetica">oranghilang.</h5>
                     </div>
                  </div>
               </a>
            </div>
            <div class="peer">
               <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
            </div>
         </div>
      </div>      
      <?php
         $hal = $this->uri->segment(1);
      ?>
      <ul class="sidebar-menu scrollable pos-r">
         <li class="nav-item">            
            <a class="sidebar-link" href="<?=base_url()?>">
               <span class="icon-holder">               
                     <i class="c-<?=($hal=='home'||$hal=='')?'blue':'brown'?>-500 ti-home"></i>
               </span>
               <span class="title">Dashboard</span>
            </a>
         </li>
         <?php if ($this->session->userdata('user_grup')=='admin'): ?>
         <li class="nav-item">            
            <a class="sidebar-link" href="<?=base_url('user')?>">
               <span class="icon-holder">               
                     <i class="c-<?=($hal=='user')?'blue':'brown'?>-500 ti-user"></i>
               </span>
               <span class="title">User</span>
            </a>
         </li>
         <?php endif ?>
         <?php if ($this->session->userdata('user_grup') == 'petugas' || $this->session->userdata('user_grup') == 'admin'): ?>
         <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
              <span class="icon-holder">
                <i class="c-<?=($hal=='pendataan')?'blue':'brown'?>-500 ti-home"></i>
              </span>
              <span class="title">Orang Hilang</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="sidebar-link" href="<?= base_url('pendataan')?>">Proses Pencarian</a>
              </li>
              <li>
                <a class="sidebar-link" href="<?= base_url('pendataan/ditemukanhidup')?>">Ditemukan (Hidup)</a>
              </li>
              <li>
                <a class="sidebar-link" href="<?= base_url('pendataan/ditemukanmeninggal')?>">Ditemukan (Meninggal)</a>
              </li>
              <li>
                <a class="sidebar-link" href="<?= base_url('pendataan/tidakditemukan')?>">Tidak Ditemukan</a>
              </li>
            </ul>
         </li>
         <li class="nav-item">
            <a class="sidebar-link" href="<?=base_url('bencana')?>">
               <span class="icon-holder">
                  <i class="c-<?=($hal=='bencana')?'blue':'brown'?>-500 ti-agenda"></i>
               </span>
               <span class="title">Bencana</span>
            </a>
         </li>         
         <?php endif ?>         
         <?php if ($this->session->userdata('user_grup')=='writer' || $this->session->userdata('user_grup')=='admin'): ?>
           <li class="nav-item">
            <a class="sidebar-link" href="<?=base_url('berita')?>">
               <span class="icon-holder">
                  <i class="c-<?=($hal=='berita')?'blue':'brown'?>-500 ti-write"></i>
               </span>
               <span class="title">Berita</span>
            </a>
         </li>
         <?php endif ?>
   </ul>
</div>
=======
<style type="text/css">
        @font-face {
          font-family: coolvetica;
          src: url(<?=base_url('assets/coolvetica.ttf')?>);
        }
        .aaaaa:before {
          color: black;
            margin-left: 20px;
            top: 20px;
            position: absolute;
            content: "\E610";
        } 
        </style>
<div class="sidebar">
   <div class="sidebar-inner">
      <div class="sidebar-logo">
         <div class="peers ai-c fxw-nw">
            <div class="peer peer-greed">
               <a class="sidebar-link td-n" href="<?=base_url()?>">
                  <div class="peers ai-c fxw-nw">
                     <div class="peer">
                        <div class="logo"><i class="ti-search aaaaa" style="font-size: 2em;"></i></div>
                     </div>
                     <div class="peer peer-greed">
                        <h5 class="lh-1 mB-0 logo-text" style="font-family: coolvetica">oranghilang.</h5>
                     </div>
                  </div>
               </a>
            </div>
            <div class="peer">
               <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
            </div>
         </div>
      </div>      
      <?php
         $hal = $this->uri->segment(1);
      ?>
      <ul class="sidebar-menu scrollable pos-r">
         <li class="nav-item">            
            <a class="sidebar-link" href="<?=base_url()?>">
               <span class="icon-holder">               
                     <i class="c-<?=($hal=='home'||$hal=='')?'blue':'brown'?>-500 ti-home"></i>
               </span>
               <span class="title">Dashboard</span>
            </a>
         </li>
         <?php if ($this->session->userdata('user_grup')=='admin'): ?>
         <li class="nav-item">            
            <a class="sidebar-link" href="<?=base_url('user')?>">
               <span class="icon-holder">               
                     <i class="c-<?=($hal=='user')?'blue':'brown'?>-500 ti-user"></i>
               </span>
               <span class="title">User</span>
            </a>
         </li>
         <?php endif ?>
         <?php if ($this->session->userdata('user_grup') == 'petugas' || $this->session->userdata('user_grup') == 'admin'): ?>
         <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
              <span class="icon-holder">
                <i class="c-<?=($hal=='pendataan')?'blue':'brown'?>-500 ti-search"></i>
              </span>
              <span class="title">Orang Hilang</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="sidebar-link" href="<?= base_url('pendataan')?>">Proses Pencarian</a>
              </li>
              <li>
                <a class="sidebar-link" href="<?= base_url('pendataan/ditemukanhidup')?>">Ditemukan (Hidup)</a>
              </li>
              <li>
                <a class="sidebar-link" href="<?= base_url('pendataan/ditemukanmeninggal')?>">Ditemukan (Meninggal)</a>
              </li>
              <li>
                <a class="sidebar-link" href="<?= base_url('pendataan/tidakditemukan')?>">Tidak Ditemukan</a>
              </li>
            </ul>
         </li>        
         <li class="nav-item">            
            <a class="sidebar-link" href="<?=base_url('cetak')?>">
               <span class="icon-holder">               
                     <i class="c-<?=($hal=='cetak')?'blue':'brown'?>-500 ti-printer"></i>
               </span>
               <span class="title">Cetak</span>
            </a>
         </li>     
         <?php endif ?>         
         <?php if ($this->session->userdata('user_grup')=='writer' || $this->session->userdata('user_grup')=='admin'): ?>
           <li class="nav-item">
            <a class="sidebar-link" href="<?=base_url('berita')?>">
               <span class="icon-holder">
                  <i class="c-<?=($hal=='berita')?'blue':'brown'?>-500 ti-write"></i>
               </span>
               <span class="title">Berita</span>
            </a>
         </li>
         <?php endif ?>
   </ul>
</div>
>>>>>>> ce94da6158e928b04eed576406aabac5e58df1ea
</div>