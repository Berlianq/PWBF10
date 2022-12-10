

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Makanan & Minuman</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="<?php echo e(route('foods.create')); ?>" class="btn btn-sm btn-outline-primary">Tambah</a>
        </div>
    </div>
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
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Stock</th>
                <th scope="col">Harga</th>
                <th scope="col">Kategori</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td>
                    <img src="<?php echo e(asset('storage/' . $food->image)); ?>" alt="" width="100" class="img-thumbnail">
                </td>
                <td><?php echo e($food->name); ?></td>
                <td><?php echo e($food->stock); ?></td>
                <td>Rp. <?php echo e(number_format($food->price, 2,',','.')); ?></td>
                <td><?php echo e($food->category); ?></td>
                <td>
                    <div class="d-block">
                        <a href="<?php echo e(route('foods.edit', $food->id)); ?>" class="badge text-bg-info">Edit</a>
                        <a href="<?php echo e(route('foods.show', $food->id)); ?>" class="badge text-bg-dark">Detail</a>
                        <form action="<?php echo e(route('foods.destroy', $food->id)); ?>" method="post" class="d-inline-block">
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
        <?php echo e($foods->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ACER\Documents\GitHub\PWBF10\e-canteen\resources\views/foods/index.blade.php ENDPATH**/ ?>