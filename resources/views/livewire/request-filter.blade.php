<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <button wire:click="filter({{ 999 }})" type="button" class="btn btn-custom" value="999">
                    <div class="card-body">
                        <div class="text-center text-primary">ทั้งหมด</div>
                    </div>
                </button>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <button wire:click="filter({{ 0 }})" type="button" id="selected" class="btn btn-custom" value="0">
                    <div class="card-body">
                        <div class="text-center text-warning">รออนุมัติ</div>
                    </div>
                </button>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <button wire:click="filter({{ 1 }})" type="button" class="btn btn-custom" value="1">
                    <div class="card-body">
                        <div class="text-center text-success">อนุมัติ</div>
                    </div>
                </button>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <button wire:click="filter({{ -2 }})" type="button" class="btn btn-custom" value="-1">
                    <div class="card-body">
                        <div class="text-center text-danger">ไม่อนุมัติ</div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
