<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card ">
                <button wire:click.prevent="filter({{ 999 }})" type="button" class="btn btn-custom ft" value="999">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col text-start ms-3"><img  class="" src="./img/image.png" width="80" height="80"></div>
                            <div class="col text-center me-5 mt-2">
                                <div class="text-primary fs-5">ทั้งหมด</div>
                                <div class="fs-5">{{ $countAll }}</div>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <button wire:click.prevent="filter({{ 0 }})" type="button" id="selected" class="btn btn-custom ft" value="0">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col text-start ms-3"><img  class="" src="./img/pending-approval.png" width="80" height="80"></div>
                            <div class="col text-center me-5 mt-2">
                                <div class="text-warning fs-5">รออนุมัติ</div>
                                <div class="fs-5">{{ $countWait }}</div>
                            </div>
                        </div>

                    </div>
                </button>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <button wire:click.prevent="filter({{ 1 }})" type="button" class="btn btn-custom ft" value="1">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col text-start ms-3"><img  class="" src="./img/อนุมัติ.png" width="80" height="80"></div>
                            <div class="col text-center me-5 mt-2">
                                <div class="text-success fs-5">อนุมัติ</div>
                                <div class="fs-5">{{ $countApp }}</div>
                            </div>
                        </div>

                    </div>
                </button>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <button wire:click.prevent="filter({{ -2 }})" type="button" class="btn btn-custom ft" value="-1">
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col text-start ms-3"><img  class="" src="./img/ไม่อนุมัติ.png" width="80" height="80"></div>
                            <div class="col text-center me-5 mt-2">
                                <div class="text-danger fs-5">ไม่อนุมัติ</div>
                                <div class="fs-5">{{ $countRej }}</div>
                            </div>
                        </div>

                    </div>
                </button>
            </div>
        </div>
    </div>

</div>
