<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
      <title>Dashboard</title>
      <style>#loader{transition:all .3s ease-in-out;opacity:1;visibility:visible;position:fixed;height:100vh;width:100%;background:#fff;z-index:90000}#loader.fadeOut{opacity:0;visibility:hidden}.spinner{width:40px;height:40px;position:absolute;top:calc(50% - 20px);left:calc(50% - 20px);background-color:#333;border-radius:100%;-webkit-animation:sk-scaleout 1s infinite ease-in-out;animation:sk-scaleout 1s infinite ease-in-out}@-webkit-keyframes sk-scaleout{0%{-webkit-transform:scale(0)}100%{-webkit-transform:scale(1);opacity:0}}@keyframes sk-scaleout{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}</style>
      <link href="<?=base_url()?>assets/style.css" rel="stylesheet">   
      <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
      <?php echo isset($datatablescss) ? '' : $datatablescss = false; ?>
      <?php if ($datatablescss): ?>
        <link rel="stylesheet" href="<?= base_url('assets/datatable/datatables/dataTables.bootstrap.css') ?>"/>
      <?php endif ?>
   </head>
   <body class="app">
    <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 7%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
      </style>        
      <div id="loader">
         <div class="spinner"></div>
      </div>
      <script>window.addEventListener('load', () => {
         const loader = document.getElementById('loader');
         setTimeout(() => {
           loader.classList.add('fadeOut');
         }, 300);
         });
      </script>
      <div>
         <?php $this->load->view('layout/sidebar')?>
         <div class="page-container">
            <div class="header navbar">
               <div class="header-container">
                  <ul class="nav-left">
                     <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
                     <li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);"><i class="search-icon ti-search pdd-right-10"></i> <i class="search-icon-close ti-close pdd-right-10"></i></a></li>
                     <li class="search-input"><input class="form-control" type="text" placeholder="Search..."></li>
                  </ul>
                  <ul class="nav-right">
                     <li class="dropdown">
                        <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                           <div class="peer mR-10"><img class="w-2r bdrs-50p" src="https://randomuser.me/api/portraits/men/10.jpg" alt=""></div>
                           <div class="peer"><span class="fsz-sm c-grey-900"><?=$this->session->userdata('nama')?></span></div>
                        </a>
                        <ul class="dropdown-menu fsz-sm">                          
                           <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i> <span>Profile</span></a></li>
                           <li role="separator" class="divider"></li>
                           <?= form_open('login/logout', array('id' => 'form-logout', 'role' => 'form','enctype'=>'multipart/from-data','style'=>'margin-left: 10%;margin-top:5%'));?>
                           <li>
                              <a href="javascript:;" onclick="document.getElementById('form-logout').submit();" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i> <span>Logout</span></a>
                           </li>
                           <?=form_close()?>                       
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
            <main class="main-content bgc-grey-100">
               <div id="mainContent">
                 <?php $this->load->view($view)?>
               </div>
            </main>
            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600"><span>Copyright © 2017 Designed by <a href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a>. All rights reserved.</span></footer>
         </div>
      </div>      
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
      <script src="<?php echo base_url('assets/datatable/datatables/jquery.dataTables.js') ?>" ></script>
      <script src="<?php echo base_url('assets/datatable/datatables/dataTables.bootstrap.js') ?>"></script>
      <script>var base_url = '<?= base_url() ?>';</script>
      <script type="text/javascript" src="<?= base_url('assets/vendor.js')?>"></script><script type="text/javascript" src="<?=base_url('assets/bundle.js')?>"></script>
      <?php echo isset($js_validation) ? '' : $js_validation = false; ?>
      <?php if ($js_validation): ?>
         <script type="text/javascript" src="<?= base_url('assets/js/validation/');echo $js_validation?>.js"></script>
      <?php endif ?>
      
      <?php echo isset($dropdown) ? '' : $dropdown = false; ?>
      <?php if ($dropdown): ?>
         <script type="text/javascript" src="<?= base_url('assets/js/');echo $dropdown?>.js"></script>
      <?php endif ?>   

      <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
      <?php echo isset($editor) ? '' : $editor = false; ?>
      <?php if ($editor): ?>
         <script type="text/javascript" src="<?= base_url('assets/js/'.$editor)?>.js"></script>
      <?php endif ?>

      <?php echo isset($datatables) ? '' : $datatables = false; ?>
      <?php if ($datatables): ?>
         <script type="text/javascript" src="<?= base_url('assets/js/'.$datatables)?>.js"></script>
      <?php endif ?>
      <?php echo isset($js) ? '' : $js = false; ?>
      <?php if ($js): ?>
         <script type="text/javascript" src="<?= base_url('assets/js/'.$js)?>.js"></script>
      <?php endif ?>
      <?php echo isset($js2) ? '' : $js2 = false; ?>
      <?php if ($js2): ?>
         <script type="text/javascript" src="<?= base_url('assets/js/'.$js2)?>.js"></script>
      <?php endif ?>
	    <?php echo isset($id) ? '' : $id = false; ?>
        <?php if ($id): ?>
          <script type="text/javascript"> const id = <?= $id ?></script>
        <?php endif ?>
	  </body>
</html>