

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pesanan</h1>
</div>

<div class="my-3">
    <form action="" method="get">
        <label for="q" class="form-label">Cari</label>
        <input type="text" class="form-control" id="q" name="q" value="<?php echo e(request('q')); ?>">
    </form>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Dipesan oleh</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Dipesan pada</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pesanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($pesanan->user->name); ?></td>
                <td><?php echo e(substr($pesanan->keterangan, 0, 40)); ?></td>
                <td><?php echo e($pesanan->dipesan_pada); ?></td>
                <td>
                    <?php if($pesanan->status == 0): ?>
                    <span class="badge text-bg-warning">Sedang diproses</span>
                    <?php elseif($pesanan->status == 1): ?>
                    <span class="badge text-bg-primary">Siap diambil</span>
                    <?php elseif($pesanan->status == 2): ?>
                    <span class="badge text-bg-success">Sudah dibayar</span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="d-block">
                        <a href="<?php echo e(route('pesanans.show', $pesanan->id)); ?>" class="badge text-bg-dark">Detail</a>
                        <?php if($pesanan->status != 2): ?>
                        <form action="<?php echo e(route('pesanans.update-status', $pesanan->id)); ?>" method="post"
                            class="d-inline-block">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <button class="badge text-bg-info border-0">
                                <?php if($pesanan->status == 0): ?>
                                Siap diambil
                                <?php elseif($pesanan->status == 1): ?>
                                Siap dibayar
                                <?php endif; ?>
                            </button>
                        </form>
                        <?php endif; ?>
                        <form action="<?php echo e(route('pesanans.destroy', $pesanan->id)); ?>" method="post"
                            class="d-inline-block">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="badge text-bg-danger border-0">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="py-3">
        <?php echo e($pesanans->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ACER\Documents\GitHub\PWBF10\e-canteen\resources\views/pesanans/index.blade.php ENDPATH**/ ?>