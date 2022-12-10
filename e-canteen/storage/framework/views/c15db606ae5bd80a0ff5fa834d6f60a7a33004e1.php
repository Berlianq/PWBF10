

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-7">

        <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm justify-content-between">
            <div class="lh-1">
                <h1 class="h6 mb-0 text-white lh-1">Detail Makanan / Minuman</h1>
            </div>
            <div>
                <a href="<?php echo e(route('foods.index')); ?>" class="btn btn-outline-danger px-3">Kembali</a>
            </div>
        </div>


        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo e(asset('storage/' . $food->image)); ?>" alt="" class="img-thumbnail d-block w-100">
                </div>
                <div class="col-md-6">
                    <table class="table table-striped table-bordered table-sm">
                        <tr>
                            <td class="fw-bold">Nama</td>
                            <td><?php echo e($food->name); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Stock</td>
                            <td><?php echo e($food->stock); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Harga</td>
                            <td>Rp. <?php echo e(number_format($food->price, 2,',','.')); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Kategori</td>
                            <td><?php echo e($food->category); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold"></td>
                            <td>
                                <div class="d-block">
                                    <a href="<?php echo e(route('foods.edit', $food->id)); ?>" class="badge text-bg-info">Edit</a>
                                    <form action="<?php echo e(route('foods.destroy', $food->id)); ?>" method="post"
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

        <div>
            <?php echo nl2br($food->description); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ACER\Documents\GitHub\PWBF10\e-canteen\resources\views/foods/show.blade.php ENDPATH**/ ?>