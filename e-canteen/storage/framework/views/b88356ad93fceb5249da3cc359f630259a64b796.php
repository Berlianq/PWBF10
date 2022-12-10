

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-8">

        <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm justify-content-between">
            <div class="lh-1">
                <h1 class="h6 mb-0 text-white lh-1">Detail Pesanan</h1>
            </div>
            <div>
                <a href="<?php echo e(route('pesanans.index')); ?>" class="btn btn-outline-danger px-3">Kembali</a>
            </div>
        </div>


        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="row">
                <div class="col">
                    <table class="table table-striped table-bordered table-sm">
                        <tr>
                            <td class="fw-bold">Nama Pemesan</td>
                            <td><?php echo e($pesanan->user->name); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Keterangan</td>
                            <td><?php echo nl2br($pesanan->keterangan ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Dipesan Pada</td>
                            <td><?php echo e($pesanan->dipesan_pada . ' / ' .
                                Illuminate\Support\Carbon::parse($pesanan->dipesan_pada)->diffForHumans()); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Pesanan</td>
                            <td>
                                <?php $__currentLoopData = $pesanan->pesananDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card mb-1">
                                    <div class="card-body p-1">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?php echo e(asset('storage/'.$detail->food->image)); ?>" alt=""
                                                    class="img-thumbnail w-100">
                                            </div>
                                            <div class="col-sm-9 p-2">
                                                <a href="<?php echo e(route('foods.show', $detail->food->id)); ?>"
                                                    class="d-block mb-1 fw-bold"><?php echo e($detail->food->name); ?></a>
                                                <span class="d-block">Jumlah/Quantitas: <?php echo e($detail->jumlah); ?></span>
                                                <span class="d-block">Harga Beli: <?php echo e(number_format($detail->harga_beli,
                                                    2,',','.')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Status</td>
                            <td> <?php if($pesanan->status == 0): ?>
                                <span class="badge text-bg-warning">Sedang diproses</span>
                                <?php elseif($pesanan->status == 1): ?>
                                <span class="badge text-bg-primary">Siap diambil</span>
                                <?php elseif($pesanan->status == 2): ?>
                                <span class="badge text-bg-success">Sudah dibayar</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold"></td>
                            <td>
                                <div class="d-block">
                                    
                                    <form action="<?php echo e(route('pesanans.destroy', $pesanan->id)); ?>" method="post"
                                        class="d-inline-block">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="badge text-bg-danger border-0">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ACER\Documents\GitHub\PWBF10\e-canteen\resources\views/pesanans/show.blade.php ENDPATH**/ ?>