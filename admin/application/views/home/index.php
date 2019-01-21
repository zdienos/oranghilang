<div class="masonry-item w-100">
  <div class="row gap-20">
    <div class="col-md-3">
      <div class="layers bd bgc-white p-20">
        <div class="layer w-100 mB-10">
          <h6 class="lh-1"><a href="<?= base_url('pendataan')?>">Orang Hilang Proses Pencarian</a></h6>
        </div>
        <div class="layer w-100">
          <div class="peers ai-sb fxw-nw">
            <div class="peer peer-greed">
              <span id="sparklinedash"></span>
            </div>
            <div class="peer">
              <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?= $row_orang_hilang_proses_pencarian ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="layers bd bgc-white p-20">
        <div class="layer w-100 mB-10">
          <h6 class="lh-1"><a href="<?= base_url('pendataan/ditemukanhidup')?>">Orang Hilang Ditemukan Hidup</a></h6>
        </div>
        <div class="layer w-100">
          <div class="peers ai-sb fxw-nw">
            <div class="peer peer-greed">
              <span id="sparklinedash2"></span>
            </div>
            <div class="peer">
              <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500"><?= $row_orang_hilang_ditemukan ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="layers bd bgc-white p-20">
        <div class="layer w-100 mB-10">
          <h6 class="lh-1"><a href="<?= base_url('pendataan/ditemukanmeninggal')?>">Orang Hilang Ditemukan Meninggal</a></h6>
        </div>
        <div class="layer w-100">
          <div class="peers ai-sb fxw-nw">
            <div class="peer peer-greed">
              <span id="sparklinedash3"></span>
            </div>
            <div class="peer">
              <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500"><?= $row_orang_hilang_ditemukan_meninggal ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="layers bd bgc-white p-20">
        <div class="layer w-100 mB-10">
          <h6 class="lh-1"><a href="<?= base_url('pendataan/tidakditemukan')?>">Orang Hilang Tidak Ditemukan</a></h6>
        </div>
        <div class="layer w-100">
          <div class="peers ai-sb fxw-nw">
            <div class="peer peer-greed">
              <span id="sparklinedash4"></span>
            </div>
          <div class="peer">
            <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500"><?= $row_orang_hilang_tidak_ditemukan ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="masonry-item w-100">
  <div class="row gap-20">
    <div class="col-md-4">
      <div class="layers bd bgc-white p-20">
        <div class="layer w-100 mB-10">
          <h6 class="lh-1"><a href="<?= base_url('user')?>">Petugas</a></h6>
        </div>
        <div class="layer w-100">
          <div class="peers ai-sb fxw-nw">
            <div class="peer peer-greed">
              <span id="sparklinedash5"></span>
            </div>
            <div class="peer">
              <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?= $row_petugas ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="layers bd bgc-white p-20">
        <div class="layer w-100 mB-10">
          <h6 class="lh-1"><a href="<?= base_url('berita')?>">Berita Diterbitkan</a></h6>
        </div>
        <div class="layer w-100">
          <div class="peers ai-sb fxw-nw">
            <div class="peer peer-greed">
              <span id="sparklinedash6"></span>
            </div>
            <div class="peer">
              <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500"><?= $row_published_berita ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="layers bd bgc-white p-20">
        <div class="layer w-100 mB-10">
          <h6 class="lh-1"><a href="<?= base_url('berita')?>">Berita Belum Diterbitkan</a></h6>
        </div>
        <div class="layer w-100">
          <div class="peers ai-sb fxw-nw">
            <div class="peer peer-greed">
              <span id="sparklinedash7"></span>
            </div>
            <div class="peer">
              <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500"><?= $row_not_published_berita ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>