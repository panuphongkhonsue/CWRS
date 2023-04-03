<div class="row">
    <div class="col-md-3">
        <div class="card">
            <button wire:model="req_type" wire:click="filter" type="button" class="btn" value="999">
                <div class="card-body">
                    <div class="text-center text-primary">ทั้งหมด</div>
                </div>
            </button>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <button wire:model="req_type" wire:click="filter" type="button" class="btn" value="0">
                <div class="card-body">
                    <div class="text-center text-warning">รออนุมัติ</div>
                </div>
            </button>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <button wire:model="req_type" wire:click="filter" type="button" class="btn" value="1">
                <div class="card-body">
                    <div class="text-center text-success">อนุมัติ</div>
                </div>
            </button>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <button wire:model="req_type" wire:click="filter" type="button" class="btn" value="-1">
                <div class="card-body">
                    <div class="text-center text-danger">ไม่อนุมัติ</div>
                </div>
            </button>
        </div>
    </div>
</div>
