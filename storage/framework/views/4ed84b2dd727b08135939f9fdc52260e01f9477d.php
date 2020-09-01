<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <?php echo e($post->title); ?>

                </div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo nl2br(e(str_limit($post->body, 200))); ?>

                    </p>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 <?php echo e($post->created_at->format('Y.m.d')); ?>

                    </span>

                    <?php if($post->comments->count()): ?>
                        <span class="badge badge-primary">
                            コメント <?php echo e($post->comments->count()); ?>件
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Kiddingly-board/laravel-bbs/resources/views/Posts/index.blade.php ENDPATH**/ ?>