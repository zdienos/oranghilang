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
               <ul class="sidebar-menu scrollable pos-r">
                  <?php if ($this->session->userdata('user_grup') == 'petugas'): ?>
                    <li class="nav-item mT-30"><a class="sidebar-link" href="<?=base_url()?>"><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Orang Hilang</span></a></li>
                    <li class="nav-item"><a class="sidebar-link" href="<?=base_url('bencana')?>"><span class="icon-holder"><i class="c-brown-500 ti-agenda"></i> </span><span class="title">Bencana</span></a></li>
                    
                  <?php endif ?>
                  <li class="nav-item mT-30 active"><a class="sidebar-link" href="<?=base_url()?>"><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Dashboard</span></a></li>
                  <li class="nav-item"><a class="sidebar-link" href="<?=base_url('pendataan')?>"><span class="icon-holder"><i class="c-brown-500 ti-agenda"></i> </span><span class="title">Pendataan</span></a></li>
                  
               </ul>
            </div>
         </div>