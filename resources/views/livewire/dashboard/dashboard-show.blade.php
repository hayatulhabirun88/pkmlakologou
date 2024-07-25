<div>
    <div class="row">
        <div class="col-12">
            <div class="row g-0">
                <div class="col-lg-3 col-md-6">
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icons-Add-File"></i></h3>
                                            <p class="text-muted">PENDAFTARAN</p>
                                        </div>
                                        <div class="ms-auto">
                                            <h2 class="counter text-primary">{{ $totalPendaftaran }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icons-Heart"></i></h3>
                                            <p class="text-muted">BEROBAT</p>
                                        </div>
                                        <div class="ms-auto">
                                            <h2 class="counter text-cyan">{{ $totalBerobat }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icons-Envelope"></i></h3>
                                            <p class="text-muted">RESEP</p>
                                        </div>
                                        <div class="ms-auto">
                                            <h2 class="counter text-purple">{{ $totalResep }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icons-Milk-Bottle"></i></h3>
                                            <p class="text-muted">OBAT</p>
                                        </div>
                                        <div class="ms-auto">
                                            <h2 class="counter text-success">{{ $totalObat }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pendaftaran</h5>
                    <div class="stats-row m-t-20 m-b-20">
                        <div class="stat-item">
                            <h6>Tahunan</h6> <b>{{ $totalPendaftaranPertahun }}</b>
                        </div>
                        <div class="stat-item">
                            <h6>Bulanan</h6> <b>{{ $totalPendaftaranPerbulan }}</b>
                        </div>
                        <div class="stat-item">
                            <h6>Harian</h6> <b>{{ $totalPendaftaranHariIni }}</b>
                        </div>
                    </div>
                </div>
                <div id="sparkline8" class="sparkchart"><canvas width="658" height="50"
                        style="display: inline-block; width: 658px; height: 50px; vertical-align: top;"></canvas></div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Berobat</h5>
                    <div class="stats-row m-t-20 m-b-20">
                        <div class="stat-item">
                            <h6>Tahunan</h6> <b>{{ $totalBerobatTahunIni }}</b>
                        </div>
                        <div class="stat-item">
                            <h6>Bulanan</h6> <b>{{ $totalBerobatBulanIni }}</b>
                        </div>
                        <div class="stat-item">
                            <h6>Harian</h6> <b>{{ $totalBerobatHariIni }}</b>
                        </div>
                    </div>
                </div>
                <div id="sparkline9" class="sparkchart"><canvas width="658" height="50"
                        style="display: inline-block; width: 658px; height: 50px; vertical-align: top;"></canvas></div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Resep</h5>
                    <div class="stats-row m-t-20 m-b-20">
                        <div class="stat-item">
                            <h6>Tahunan</h6> <b>{{ $totalResepTahunIni }}</b>
                        </div>
                        <div class="stat-item">
                            <h6>Bulanan</h6> <b>{{ $totalResepBulanIni }}</b>
                        </div>
                        <div class="stat-item">
                            <h6>Harian</h6> <b>{{ $totalResepHariIni }}</b>
                        </div>
                    </div>
                </div>
                <div id="sparkline10" class="sparkchart"><canvas width="658" height="50"
                        style="display: inline-block; width: 658px; height: 50px; vertical-align: top;"></canvas></div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>
