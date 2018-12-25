<div class="sidebar">
   <div class="sidebar-inner">
      <div class="sidebar-logo">
         <div class="peers ai-c fxw-nw">
            <div class="peer peer-greed">
               <a class="sidebar-link td-n" href="<?=base_url()?>">
                  <div class="peers ai-c fxw-nw">
                     <div class="peer">
                        <div class="logo"><img src="<?=base_url()?>assets/static/images/logo.png" alt=""></div>
                     </div>
                     <div class="peer peer-greed">
                        <h5 class="lh-1 mB-0 logo-text">Adminator</h5>
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
   </ul>
</div>
</div>