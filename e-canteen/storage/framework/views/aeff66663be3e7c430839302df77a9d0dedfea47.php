

<?php $__env->startSection('content'); ?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('img/breadcrumb.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo e(route('home.index')); ?>">Beranda</a>
                        <span>Pesanan Saya</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="text-left">Keterangan</th>
                                <th>Dipesan Pada</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $pesanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-left">
                                    <?php echo nl2br($pesanan->keterangan ?? '-'); ?>

                                </td>
                                <td class="shoping__cart__total">
                                    Rp. <?php echo e(number_format($pesanan->total_harga,
                                    2,',','.')); ?>

                                </td>
                                <td class="shoping__cart__total">
                                    <?php echo e($pesanan->dipesan_pada); ?>

                                </td>
                                <td>
                                    <?php if($pesanan->status == 0): ?>
                                    <span class="badge badge-warning">Sedang diproses</span>
                                    <?php elseif($pesanan->status == 1): ?>
                                    <span class="badge badge-primary">Siap diambil</span>
                                    <?php elseif($pesanan->status == 2): ?>
                                    <span class="badge badge-success">Sudah dibayar</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('home.pesanan-saya-detail', $pesanan)); ?>"
                                        class="btn primary-btn">Detail</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ACER\Documents\GitHub\PWBF10\e-canteen\resources\views/home/pesanan-saya.blade.php ENDPATH**/ ?>